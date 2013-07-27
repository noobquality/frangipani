<? session_start(); ?>
<html>
    
    <head>
        <? include( "includes/head.php"); ?>
    </head>
    
    <body>
        <div id="header">
            <nav>
                <ul id="nav">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li><a href="about.php" class="current">About</a>
                    </li>
                    <li><a href="menu.php">Menu</a>
                    </li>
                    <li><a href="gallery.php">Gallery</a>
                    </li>
                    <li><a href="contact.php">Contact</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div id="container">
            <? include( "includes/user.php"); ?>
            <div class="wrapper">
                <div class="border"></div>
                <article>
                     <h3>No Secret About Us!</h3>

                    <div class="date"><span class="day">26</span>  <span class="month">September</span>  <span class="year">2008</span> 
                    </div>
                    <img src="images/home/7.jpg" width="300" class="right" alt="" />
                    <p>The day that we are born. Hold on <em>4 years old kid can cooking all of this</em>,
                        no kidin'. we born on that place, "pasar batan kendal" if translate to
                        english mean <em>"market under the sandals (sendal)"</em> no kidin' <code>again</code>.
                        Not poor like the name pasar batan kendal is good traditional market, you
                        can buy everything for your kitchen with good cost rather than you buy
                        in super market, also you can found some traditional food, but we are not
                        there anymore.</p>
                    <img src="images/home/8.jpg" width="300" class="right"
                    alt="" />
                    <p>
                        <h6>Men Bekung</h6>In 1995, the first men bekung apperience to the delight of <em>gedang mekuah</em>,
                        and his son <em>Made Cenik</em>. The idea was simple; provide a delicious
                        food with low cost to make evryone can buy. Over the years, the more people
                        like <em>Gedang Mekuah</em> from <em>Men Bekung</em>, mainly because it tastes
                        good, but at a low price.
						<br />
						<br />
                        <h6>Philosophy</h6>The customer is at the heart of the <em>"frangipani bali"</em> business
                        philosophy, with a real dedication to delivering a good food, but at a
                        low price. From the moment guests enter the door, they are treated to a
                        broad array of tempting exotic and classic drinks. The tropical appeal
                        of the decor creates a comfortable and enjoyable dining environment. The
                        dining begins with a passion for great food, infused with globally inspired
                        bold flavors and recipes, freshness and quality ingredients and the flair
                        of wood-fired and wok cooking styles. Value has always been the underlying
                        theme of <em>"frangipani bali"</em> offering large portions, appealing presentation
                        and great value for money. People are the key to delivering the <em>"frangipani bali"</em> preferred
                        dining experience through warm, friendly and attentive service. they go
                        to great lengths to make the dining experience unique and memorable.</p>
                    <blockquote>
                        <p><strong>we born to this world with nothing, but we got everything in this world,
                            include the good food so, "anyone can eat good food"</strong>
                        </p>
                    </blockquote>
                </article>
                <aside class="sidebar">
                     <h3>Here We Are Now</h3>

                    <img src="images/home/1.jpg" width="280" alt="" />
                    <p><strong>Open 8AM - 11PM daily</strong> Frangipani Bar & Restaurant is within
                        walking distance of all the Pemuteran hotels and only a few minutes walk
                        from the beach. Our bar and lounge, surrounded by lush gardens are situated
                        on the ground floor; a perfect place to relax in comfortable lounges and
                        have a fresh coffee or a gourmet fruit drink. We serve icy cold beer, quality
                        wine and a large selection of cocktails.
                        <br>
                    </p>
                    <div class="border4"></div>
                    	<h3>We Are Social!</h3>

                    <? include( "includes/social.php"); ?>
                </aside>
                <div class="border2"></div>
                <br>
            </div>
            <footer>
                <? include( "includes/footer.php"); ?>
            </footer>
        </div>
    </body>

</html>