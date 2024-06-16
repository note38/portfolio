<?php
include 'classes/connect.php';


?>

<?php
    include 'templates/header.php';
?>

       <section class="bg-[url('./images/banner1.jpg')] bg-no-repeat bg-cover h-[500px]">
         <div class="flex justify-center items-center h-full">
            <div class="text-center ">
              <h1 class="text-[1.9rem] font-semibold lg:text-5xl"> Make Today</h1>
              <p class="py-[1rem] ">
                Send Your Message 
              </p>
              <button class="relative px-6 py-3 font-bold text-black group">
                <span class="absolute inset-0 w-full h-full transition 
                duration-300 ease-out transform -translate-x-2
                 -translate-y-2 bg-green-300 group-hover:translate-x-0
                  group-hover:translate-y-0"></span>
                <span class="absolute inset-0 w-full h-full border-4 border-black"></span>
                <span class="relative">Shop all</span>
                </button>
            </div>
        </div>
       </section>

        <section class="py-[1.5rem] flex justify-center text-center">
            <div class="p-[.5rem]">
                <h2 class="font-semibold text-[1.7rem] lg:text-[2rem]">Knit Love</h2>
                <p class="py-[1rem] text-[.8rem] lg:text-sm max-w-[600px]">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ut
                 porttitor risus. Etiam lacus quam, sodales eu nisi sed, semper suscipit</p>
            </div>
        </section>

        <?php
    // include 'templates/shop_card.php';
?>


<?php
    include 'templates/footer.php';
?>