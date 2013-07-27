<?php
/* ****************************************************************************

#	Module Name		:	# SPA Simple Paging
#	Version			:	# v 2.1
#	Date			:	# 11 /February/ 2008
#	Author			:	# Prakash A Bhat (yahoo / gmail / skype id: spabhat)
#	website			:	spabhat.wordpress.com
#	Description		:	The paging class just takes a table name as input
						returns the number of pages based on various settings.
						The paging class can be used to on a sigle table or
						even with custom simple / complex SQL statements.
						ie. it now Supports JOINS, Nested SQL, UNION etc...

	Version Info:
	v 2.1
	- a coding standard error has been corrected: "Notice: Undefined variable: totalRecs".
	- corrected a minor bug regarding the page size an issue. (Special thanks to : Mario Measor for bringing it to my notice)
	
	v 2.0
	-----------------------
		Changes:
		-
		- Elimination of inline styling in previous paging class
		- Uses CSS, allows you to easily customize look and feel
		- v1.2 used to give Mysql Error when table is empty - corrected
		- Compatible with previous versions
		- Added support for extending the paging class
		- Supports Multiple paging
		  i.e. Consider you have two tables tblA and tblB
		  AND you want to display 2nd page of tblA
		  and 6th page on tblB

	Known Issues:
		- Supports only MySQL database.
		-

	v 1.2
	-----------------------
		- Supports custom SQL

	v 1.2
	-----------------------
		Changes:
		- Added methods / functions
			to get previous, and next links, and page numbers seperately.
			(Helps in integrating with complex site designs)

		- added support for images for prev / next links
		- support for images instead of numbers.
		- compatible with previous versions
		- file naming convention changed (all small letters).

	Known Issues:
		- Does not work	when you want to have multiple paging!!!
		  i.e. Consider you have two tables tblA and tblB
		  AND you want to display 2nd page of tblA
		  and 6th page on tblB
		  - this simply does not work even with seperate instances of paging class
		  - I need to fix this issue

	v 1.0
	-----------------------
		PROS:
		- Simple to use
		- Minimum configuration
		- Simply specify the table name for which you need to implement paging
		- supports English, and French languages.
		- Easy to change number of records per page (pageSize)
		- Supports optional query strings
		- Returns the paging sql, which you need to use in your queries.

		CONS:
		- Does not work with SQL Join
		- Does not work with complex / custom queries
		- Does not support multiple tables
**************************************************************************** */

class spa_paging
{
	public $tableName;
	public $sqlMid;
	public $pageName;
	public $qryStrings;
	public $customSql;

	public $pageSize;
	public $language;
	public $curPage;
	protected $startRecNum = 0;
	public $pageLinks = "";
	public $linkNames;

	protected $nextLinks;
	protected $prevLinks;
	public $prevImg;
	public $nextImg;
	public $linkImg;
	public $useImages;
	public $pageVar = "spPage";

	public $className = "SPA_PgS1";

	public function __construct()
	{
		$this->pageSize = 10;
		$this->curPage = 1;
		$this->language = "en";
		$this->linkNames = array
			(
				"en" => array("Previous Page","Back","Next Page","Next"),
				"fr" => array("Page précédente","Dos","Prochaine page","Après")
			);
		$this->prevImg = "images/prev.png";
		$this->nextImg = "images/next.png";
		$this->linkImg = "images/dot.png";

		$this->useImages = false;
	}
	public function setPrevImage($imageName)
	{
		if ($imageName!="")
		{
			$this->prevImg=$imageName;
		}
	}
	public function setNextImage($imageName)
	{
		if ($imageName!="")
		{
			$this->nextImg=$imageName;
		}
	}
	public function pagingSql($sql="")
	{
		$this->customSql = $sql;
		if(isset($_GET[$this->pageVar])){
			$this->curPage = htmlspecialchars($_GET[$this->pageVar]);
		}
		$pageStart = 0;
		$pageSettings = "";
		$currentPage = ($this->curPage == 1)?0:($this->curPage - 1);
		$pageStart = $currentPage * $this->pageSize;
		$pageSettings = " limit " . $pageStart . "," . $this->pageSize;
		if($sql =="" ){
			$sql = "SELECT * FROM " . $this->tableName;
		}
		return $sql ." ". $pageSettings;
	}

	public function getInfo(){
		$prevLinks = "";
		$this->pageLinks = "";
		$nextLinks = "";
		$this->pageName = "";
		$totalRecs =0;
		
		if($this->customSql==""){
			$pagingSQL = "SELECT COUNT(*) AS totalRecs FROM " . $this->tableName . $this->sqlMid;
		}else{
			$pagingSQL = $this->customSql ;
		}

		if(isset($_GET[$this->pageVar])){
			$this->curPage = htmlspecialchars($_GET[$this->pageVar]);
		}
		$startRecNum = $this->curPage * $this->pageSize;

		$resObj = mysql_query($pagingSQL); //Send a MySQL query

		if(!$resObj){
			return "";
		}
		$resRow = mysql_fetch_assoc( $resObj ); //Get number of rows in result

		if($this->customSql==""){
			if(mysql_num_rows($resObj) > 0){
				$totalRecs = $resRow['totalRecs'] ; //Get number of rows in result
			}
		}else{
			$totalRecs = mysql_num_rows($resObj);			
		}
		
		$totalPages = ceil( $totalRecs / $this->pageSize);

		$this->pageName .= "?";
		if($this->qryStrings != "") {
			$this->pageName .= $this->qryStrings . "&";
		}else{
			$this->qryStrings = $this->getQueryStrings();
			$this->pageName .= $this->qryStrings . "&";
		}

		/*
		Limit the total pages to 15
		*/
		//if($totalPages > 15) {
			//$totalPages = 15;
		//}

		for( $page = 1; $page <= $totalPages; $page++ ){

			/*If current page has any query strings, add them*/
			$pageInputs = $this->pageName . $this->pageVar."=". $page;

			/*add alt text to links*/
			$alt = "Page " . $page;
			$tmpPageLinks = "<li><a href=\"";
			$tmpPageLinks .= $pageInputs ;
			$tmpPageLinks .=  "\" title=\"" . $alt . "\">";
			$tmpPageLinks .= $page;
			$tmpPageLinks .=  "</a></li>";

			/*Current page should not have links - but in bold red*/
			if($page == $this->curPage ){
				$tmpPageLinks = "<li class=\"selected\"><a href=\"#\" >";
				$tmpPageLinks .= $page;
				$tmpPageLinks .= "</a></li>";
			}

			/*current page is not at all printed when using images*/
			if($this->useImages && $page == $this->curPage){
				$tmpPageLinks ="";
			}

			$this->pageLinks .= $tmpPageLinks;
		}/*end of for loop*/

		/*add prev and next links to page*/
		$prevLinks = "";
		$nextLinks = "";
		if( $this->curPage != 1 ){
			$prev = 0;
			$prev = $this->curPage - 1;
			$prevLinks = '<li><a href="' . $this->pageName . $this->pageVar.'=' . $prev . '"';
			$prevLinks .= " title=\"";
			$prevLinks .= $this->linkNames[$this->language]["0"];
			$prevLinks .= "\" >";
			if(!$this->useImages)
			{
				$prevLinks .= "&lt;"; //$this->linkNames[$this->language]["1"];
			}
			else
			{
				$prevLinks .= "<img border=\"0\" src=\"". $this->prevImg ."\" />";
			}
			$prevLinks .= "</a></li>";

		}
		else
		{
			$prevLinks .= "<li><a href=\"#\">&lt;</a></li>";
		}
		if( ( $this->curPage ) < $totalPages )
		{
			$next = 0;
			$next = $this->curPage + 1;
			$nextLinks .= "<li><a href=\"";
			$nextLinks .= $this->pageName;
			$nextLinks .= $this->pageVar."=" . $next;
			$nextLinks .= "\"";
			$nextLinks .= " title=\"";
			$nextLinks .= $this->linkNames[$this->language]["2"];
			$nextLinks .= "\" >";
			if(!$this->useImages)
			{
				$nextLinks .= "&gt;"; //$this->linkNames[$this->language]["3"];
			}
			else
			{
				$nextLinks .= "<img border=\"0\" src=\"". $this->nextImg ."\" />";
			}
			$nextLinks .= "</a></li>";
		}
		else
		{
			$nextLinks .= "<li><a href=\"#\">&gt;</a></li>";
		}
		$this->prevLinks = $prevLinks;
		$this->nextLinks = $nextLinks;
		return "<div class=\"".$this->className."\"><ul>".$prevLinks . $this->pageLinks . $nextLinks."</ul></div>". "\n";
	}
	private function getQueryStrings()
	{
		$qryString = "";


		foreach ($_GET as $key => $val)
		{
			if($key!=$this->pageVar)
			{
				$qryString = ($qryString!="")?$qryString."&":$qryString;
				$qryString .= $key . "=" . htmlspecialchars($val);
			}
		}
		return $qryString; //"" ;//
	}
	public function prevPage()
	{
		return trim($this->prevLinks);
	}
	public function nextPage()
	{
		return trim($this->nextLinks);
	}
}

/* The old paging class had name as paging,
	and hence the following class description

#	Why renaming?
		I simply wanted to have my initials along with the class name
		AND
		I want to ensure that the name does not conflict
		with any other class named paging!!!
		Yes, there are many other PHP based paging classes.
*/
class paging extends spa_paging
{
	public function __construct()
	{
		parent::__construct();
	}
	/* You can even write custom code here */
}
?>