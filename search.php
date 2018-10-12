<? include "includes/header.php";?>
    <div class="container">
        <h3 class="ml-3 my-5">Finded products</h3>
        <div class="row">
            <?  # SCRIPT FOR GETTING PRODUCTS LIKE INPUTED SEARCHING DATA
            $search_q=$_POST['query'];
            $search_q = trim($search_q);
            $search_q = strip_tags($search_q);
            $q = mysqli_query($connection, "SELECT * FROM products WHERE Name LIKE '%$search_q%'");
            $itog=mysqli_fetch_assoc($q);
            $l=mysqli_num_rows($q);
            if(empty($l))
            {
                echo "<div class='not_found'><i>` $search_q `</i><h4>No one answer for your request, sorry =( </h4></div> ";
            }
            else
            {
            while ($itog = mysqli_fetch_assoc($q)) 
                {?>
                <div class="col-6 col-md-6 col-lg-3 offer">
                    <div class="product">
                        <div class="product_hover grey_gradient">
                            <div  class="count">
                                <form method="POST"  action="/includes/function.php" class="buy_product">
                                    <input type="text" style="display:none;" name="id_product" value="<?echo $itog['Id'];?>">
                                    <input  class="count_products" type="number"  min="1" max="6" value="1" name="count_products">
                                    <input  type="submit" class="btn-hover add color-9"  name="add" value="Add to cart" >
                                </form>
                            </div>
                            <div class="buttons">
                                <a  href="/product.php?Id=<?echo $itog['Id'];?>">
                                    <button class="btn-hover color-9">More</button>
                                </a>
                            </div>
                        </div>

                        <div class="product_unhover flex_column">
                            <div class="photo_wrapper">
                                <img class="product_photo" src="products/<?echo $itog['Main_photo'];?>">
                            </div>
                            <h5 class="mb-2"><?echo mb_substr($itog['Name'], 0, 46, 'utf-8');?>...</h5>
                            <h4 class="price_text"><?echo $itog['Price'];?>$</h4>
                        </div>  
                    </div>
                </div>
                <?}?>
            <?}?>
        </div>
    </div>  
<? include "includes/footer.php";?>