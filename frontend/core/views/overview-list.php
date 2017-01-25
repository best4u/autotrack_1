<?php
//
//echo "<pre>";
//var_dump($_SERVER['QUERY_STRING']);
//echo "</pre>";
//?>
<div class="overview_gridWrapp listMode">
    <div class="breadCrumbWrapp">
        <div class="centerDiv">
            <div class="breadContent">
                <a href="#"><span>Home</span></a> <span class="arrowBread"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span> <a href="#"><span class="activeBread">Occasions</span></a>
            </div>
        </div>
    </div>

    <div class="leftAndRightWrapp">
        <div class="centerDiv">
            <div class="leftContent_at">
                <div class="titleAndSelect">
                    <div class="titleLeftPart">
                        <h1>Occasions</h1>
                        <span class="urlAjaxFilter" style="display: none"><?php echo plugins_url('ajax_filter.php',dirname(__FILE__)); ?></span>
                    </div>

                    <div class="selectorB4uAuto">
                        <form action="" method="GET" id="sortFilter">
                            <select name="sort" id="sortSelect" class="selectCustom">
                                <option value>Sorteren op...</option>
                                <option value="prijs" <?php echo isset($_GET['sort']) && $_GET['sort'] == 'prijs' ? 'selected' : '' ?>>Prijs.</option>
                                <option value="merkModelUitvoering" <?php echo isset($_GET['sort']) && $_GET['sort'] == 'merkModelUitvoering' ? 'selected' : '' ?>>Merk, Model, Uitvoering.</option>
                                <option value="kilometerstand" <?php echo isset($_GET['sort']) && $_GET['sort'] == 'kilometerstand' ? 'selected' : '' ?>>Kilometerstand.</option>
                                <option value="datumGeplaatst" <?php echo isset($_GET['sort']) && $_GET['sort'] == 'datumGeplaatst' ? 'selected' : '' ?>>Publicatiedatum.</option>
                                <option value="at_sort_by" <?php echo isset($_GET['sort']) && $_GET['sort'] == 'at_sort_by' ? 'selected' : '' ?>>Bouwjaar.</option>

                            </select>
                        </form>

                    </div>
                </div>

                <div class="carsContentLeft listType">

                    <?php
                        foreach($all_occasions->items as $occasion){
                           ?>

                            <div class="caritemB4uList">
                                <a href="?overview=<?php echo $occasion->advertentieId ?>">
                                    <div class="imgBlock">
                                        <div class="imgTable">
                                            <div class="imgTableCell">
                                                <img src="<?php echo $ocassions_obj->get_image_link($occasion); ?>" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carTxtBlock">
                                        <div class="titlecarItem">
                                            <?php echo $ocassions_obj->get_car_name($occasion); ?>
                                        </div>
                                        <div class="descCarItem">
                                            <div class="priceCarItem">
                                                € <?php echo $ocassions_obj->get_car_price($occasion); ?>
                                            </div>

                                            <div class="carOverallDetails">
                                                <div class="leftPartDetail">
                                                    <?php
                                                    foreach($ocassions_obj->get_overview_attr($occasion) as $key => $option)
                                                    {
                                                        foreach($option as $type =>  $car_option)
                                                        {
                                                            ?>
                                                            <p><span class="leftType"><?php echo $type; ?>:</span> <span class="rightOption"><?php echo $car_option; ?></span></p>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>

                                            </div>

                                            <div class="rightButtonandLogo">
                                                <div class="logoCarItem">
                                                    <img src="<?php echo plugins_url("img/NAP_Logo.jpg",__FILE__) ?>" alt="">
                                                </div>

                                                <a href="?overview=<?php echo $occasion->advertentieId ?>" class="button_at1">
                                                    bekijk deze auto
                                                </a>
                                            </div>


                                        </div>
                                    </div>
                                </a>
                            </div>

                            <?php
                        }
                    ?>


                </div>

                <!-- Start pargination -->
                <div class="bottomNPaginationWrapp">
                    <div class="centerDiv">
                        <ul class="ulPagination">

                            <?php
                            if(isset($_GET['pagina']) && $_GET['pagina'] > 1){
                                ?>
                                <li class="prevPage"><a href="?<?php echo $_SERVER['QUERY_STRING']; ?>&pagina=<?php echo $_GET['pagina'] - 1; ?>"><span><i class="fa fa-angle-double-left" aria-hidden="true"></i></span> Vorige</a></li>
                                <?php
                            }else{

                                ?>
                                <li class="prevPage"><a href="#"><span><i class="fa fa-angle-double-left" aria-hidden="true"></i></span> Vorige</a></li>
                                <?php
                            }
                            if(isset($_GET['pagina']) && $_GET['pagina'] >= "4"){
                                ?>
                                <li><a href="?<?php echo $_SERVER['QUERY_STRING']; ?>&pagina=<?php echo $_GET['pagina']-3; ?>">...</a></li>
                                <?php
                            }
                            foreach($pagination as $page){
                            ?>
                            <li <?php if( isset($_GET['pagina']) && $_GET['pagina'] == $page){  echo 'class="activePage"'; }elseif(!isset($_GET['pagina']) && $page == '1'){ echo 'class="activePage"'; } ?>><a href="?<?php echo $_SERVER['QUERY_STRING']; ?>&pagina=<?php echo $page; ?>"><?php echo $page; ?></a></li>
                            <?php
                            }
                            if(isset($_GET['pagina']) && $_GET['pagina'] < $number_of_page){
                                ?>
                                <li><a href="?pagina=<?php echo $_GET['pagina']+3; ?>">...</a></li>
                                <li class="nextPage"><a href="?<?php echo $_SERVER['QUERY_STRING']; ?>&pagina=<?php echo $_GET['pagina']+1; ?>"">Volgende <span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a></li>

                                <?php
                            }elseif(!isset($_GET['pagina'])){
                                ?>
                                <li><a href="?pagina=<?php echo '6'; ?>">...</a></li>
                                <li class="nextPage"><a href="?<?php echo $_SERVER['QUERY_STRING']; ?>&pagina=<?php echo '6'; ?>"">Volgende <span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a></li>
                                <?php
                            }
                            ?>

                        </ul>
                    </div>
                </div>
                <!-- end pagination -->


            </div>


            <div class="sidebarContent">
                <div class="titleSidebar h2">
                    Occasion zoeken
                </div>

                <div class="sidebarFilters">
                    <form action="/" method="GET">
                        <p>
                            <label for="a">Merk</label>
                        </p>
                        <select name="name" id="marks" class="selectCustom">
                            <option value>Alle merken</option>
                            <?php
                            foreach($_SESSION['all_marks'] as $key => $mark){
                                ?>
                                <option value="<?php echo $key; ?>" class="markOption"><?php echo $mark; ?></option>
                                <?php
                            }
                            ?>
                        </select>

                        <p>
                            <label for="b">Model</label>
                        </p>
                        <select name="name" id="2" class="selectCustom">
                            <option value="volvo">Selecteer eerst een merk</option>
                            <option value="saab">Saab</option>
                            <option value="mercedes">Mercedes</option>
                            <option value="audi">Audi</option>
                        </select>

                        <button type="submit" class="button_at1">toon auto's</button>

                        <p>
                            <label for="a">Prijs</label>
                        </p>

                        <p class="priceP">
                            <span class="priceFrom">€ 0,00</span>
                            <span class="priceTo">€ 10.000,00</span>
                        </p>
                        <div class="priceSliderCont commSlideCont">
                            <div id="slider2" class="bouwjaarSlider"></div>
                        </div>
                        <div class="pricesInputs">
                            <span class="comLeftTitle">van: </span> <span class="commInputs"><input type="text" name="priceFrom" class="priceFrom form-control"></span>
                            <span class="comLeftTitle">tot: </span> <span class="commInputs"><input type="text" name="priceTo" class="priceTo form-control"></span>
                        </div>






                        <p>
                            <label for="a">Bouwjaar</label>
                        </p>
                        <p class="yearsP">
                            <span class="yearsFrom">2000</span>
                            <span class="yearsTo">2017</span>
                        </p>
                        <div class="yearSliderCont commSlideCont">
                            <div id="slider" class="bouwjaarSlider"></div>
                        </div>
                        <div class="yearsInputs">
                            <span class="comLeftTitle">van: </span> <span class="commInputs"><input type="text" name="yearsFrom" class="yearsFrom "></span>
                            <span class="comLeftTitle"> tot: </span> <span class="commInputs"><input type="text" name="yearsTo" class="yearsTo"></span>
                        </div>





                        <p>
                            <label for="b">Brandstof</label>
                        </p>
                        <select name="name" id="2" class="selectCustom">
                            <option value="volvo">Alle brandstof</option>
                            <option value="saab">Saab</option>
                            <option value="mercedes">Mercedes</option>
                            <option value="audi">Audi</option>
                        </select>

                        <p>
                            <label for="b">Carrosserie</label>
                        </p>
                        <select name="name" id="2" class="selectCustom">
                            <option value="volvo">Alle brandstof</option>
                            <option value="saab">Saab</option>
                            <option value="mercedes">Mercedes</option>
                            <option value="audi">Audi</option>
                        </select>

                        <p>
                            <label for="b">Motorinhoud</label>
                        </p>
                        <select name="name" id="2" class="selectCustom">
                            <option value="volvo">Alle brandstof</option>
                            <option value="saab">Saab</option>
                            <option value="mercedes">Mercedes</option>
                            <option value="audi">Audi</option>
                        </select>

                        <a href="#" class="button_atAlt">
                            meer zoekopties
                        </a>

                        <button type="submit" class="button_at1">toon auto's</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



</div>


