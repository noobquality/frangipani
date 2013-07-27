<? include("includes/session.php"); ?>
<html>
    <head>
        <? include("includes/head.php"); ?>
    </head>
    <body>
        <? if($row_user['type']=='admin'){?>
        <div id="header">
            <nav>
                <ul id="nav">
                    <li><a href="index.php" class="current">Home</a></li>
                    <li><a href="chart.php">Chart</a></li>
                    <li><a href="menu.php">Menu</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="member.php">Member</a></li>
                </ul>
            </nav>
        </div>
        <?} else{?>
            <div id="header">
                <nav>
                    <ul id="nav">
                        <li><a href="index.php" class="current">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="menu.php">Menu</a></li>
                        <li><a href="gallery.php">Gallery</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <?}?>
                <div id="container">
                    <header>
                        <hgroup class="intro">
                             <h1 class="title">Frangipani Bali</h1>
                             <h3 class="tagline">"Anyone Can Eat Good Food"</h3> 
                        </hgroup>
                        <div class="registrations">
                            <br />
                            <? if($_SESSION['fangipani']!=''){ if($row_user['type']=='admin'){?> <a class="hr-acc" href="myaccount.php?username=<? echo $row_user["username"];?>"><img src="images/admin.png" height="35" /></a>
                            <?} else{?>	<a class="hr-acc" href="myaccount.php?username=<? echo $row_user["username"];?>"><img src="images/user.png" height="35" /></a><a class="hr-acc" href="shoppingcart.php"><img src="images/cart.png" height="35" /></a>
                                <?}
                                echo $_SESSION['fangipani'];} 
								else{?> 
								<span class="registrations-title">Come inside</span>
                                    <hr class="hr-solid"/> <span style="font-family: 'Lobster13Regular', cursive;">Get Special Offer!</span>
                                    <hr class="hr-dashed" />
                                    <?}?>
                                        <div>
                                            <? include("includes/log.php"); ?>
                                        </div>
                    </header>
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <div class="wrapper">
                        <div class="pikachoose">
                            <ul id="pikame">
                                <li><a href=""><img src="images/home/1.jpg" alt="" /></a></li>
                                <li><a href=""><img src="images/home/2.jpg" alt="" /></a></li>
                                <li><a href=""><img src="images/home/3.jpg" alt="" /></a></li>
                                <li><a href=""><img src="images/home/4.jpg" alt="" /></a></</li>
                            </ul>
                        </div>
                        <div class="clear"></div>
                        <div class="border"></div>
                        <div class="home-widget">
                            <h3>Gedang Mekuah</h3>
                            <img src="images/home/3.jpg" width="300" alt="" />
                            <p>Gedang mekuah is a bowl of spicy green papaya and seafood soup. It was
                                my appetiser when I went for lunch at this restaurant called Bumbu Bali.
                                Bumbu Bali is one of the more posh restaurants, located in the posh resort
                                area of Nusa Dua / Tanjung Benoa. So, the price is also posh. But, the
                                ambiance is so Balinese and the service was impeccable and gracious. I
                                loved every minute of it.</p>
                        </div>
                        <div class="home-widget">
                            <h3>Nasi Goreng</h3>
                            <img src="images/home/4.jpg" width="300" alt="" />
                            <p>Nasi goreng, literally meaning "fried rice" in Indonesian, can refer simply
                                to fried pre-cooked rice, a meal including stir fried rice in small amount
                                of cooking oil or margarine, typically spiced with kecap manis (sweet soy
                                sauce), shallot, garlic, tamarind and chilli and accompanied with other
                                ingredients, particularly egg, chicken and prawns. There is also another
                                kind of nasi goreng which is made with ikan asin (salted dried fish) which
                                is also popular across Indonesia.</p>
                        </div>
                        <div class="home-widget">
                            <h3>Betutu</h3>
                            <img src="images/home/5.jpg" width="300" alt="" />
                            <p>This bebek betutu dish consisted of a piece duck that was heavily marinated
                                with a spicy Balinese spices. Its accompaniment was green beans topped
                                with fried shallots and, of course, steamed rice. It was completed with
                                two condiments, one was a simple crushed chillies sauce, another a famous
                                Balinese condiment sambal matah.</p>
                        </div>
                        <div class="border2"></div>
                        <br />
                        <aside id="pricing-table" class="clear">
                            <div class="plan">
                                <h3>Breakfast<span>$9</span></h3>
								<a class="button" href="menu.php">Order Now</a>
                                <ul>
                                    <li><strong style="text-transform:uppercase">Nasi Goreng Complete</strong></li>
                                    <li><strong style="text-transform:uppercase">Nasi Goreng Special</strong></li>
                                    <li><strong style="text-transform:uppercase">Gedang Mekuah 'lite' </strong></li>
                                    <li><strong style="text-transform:uppercase">Betutu 'lite' </strong></li>
                                </ul>
                            </div>
                            <div class="plan">
                                <h3>Lunch<span>$10</span></h3>
								<a class="button" href="menu.php">Order Now</a>
                                <ul>
                                    <li><strong style="text-transform:uppercase">Lawar Jukut Ares</strong></li>
                                    <li><strong style="text-transform:uppercase">Mixture Rice</strong></li>
                                    <li><strong style="text-transform:uppercase">Betutu</strong></li>
                                </ul>
                            </div>
                            <div class="plan">
                                <h3>Dinner<span>$10</span></h3>
								<a class="button" href="menu.php">Order Now</a>
                                <ul>
                                    <li><strong style="text-transform:uppercase">Be Balung (secret recipe)</strong></li>
                                    <li><strong style="text-transform:uppercase">nasi jukut undis</strong></li>
                                    <li><strong style="text-transform:uppercase">Be yuyu</strong></li>
                                    <li><strong style="text-transform:uppercase">Charming Betutu</strong></li>
                                </ul>
                            </div>
                        </aside>
                    </div>
                    <footer>
                        <div class="border"></div>
                        <div class="footer-widget">
                            <h4>All Is Well</h4>
                            <img src="images/home/6.jpg" width="300" alt="" />
                            <p>People from all over the world (maybe little exaggerating, most are from
                                Australia) don't go here for the ambiance, they go because of the quality
                                of the food.</p>
                        </div>
                        <div class="footer-widget">
                            <h4>Did You Know</h4>
                            <ul class="blog">
                                <li><a href="en.wikipedia.org/wiki/Clove">Fact about Clove</a><br/>Clove is the one of Betutu Secret ingredient....</li>
                                <li><a href="http://en.wikipedia.org/wiki/Sambal">Sambal Matah including top ten hottest condiment</a><br/>Sambal matah: Raw shallot & lemongrass sambal of Bali origin. It containsa lot of ...</li>
                                <li><a href="en.wikipedia.org/wiki/Nasi_goreng">Nasi Goreng = Indonesian Culture</a><br/>Nasi goreng, literally meaning "fried rice" in Indonesian, can refer simplyto fried pre-cooked rice, a meal including stir fried rice in small amountof cooking oil or ...</li>
                            </ul>
                        </div>
                        <div class="footer-widget">
                            <h4>We Are Social!</h4>
                            <? include("includes/social.php"); ?>
                            <div class="border2"></div><br />
                            <? include("includes/footer.php"); ?>
                    </footer>
                    </div>
    </body>
</html>