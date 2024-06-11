<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="stylesheet" href="css/fontawesome-free-6.4.0-web/css/fontawesome.css">
    <link rel="stylesheet" href="css/fontawesome-free-6.4.0-web/css/brands.css">
    <link rel="stylesheet" href="css/fontawesome-free-6.4.0-web/css/solid.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title></title>
</head>
<body class="">


<div class="bg-grey-lighter min-h-screen flex flex-col">
    <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
        <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
            <h1 class="mb-8 text-3xl text-center">Log in</h1>

           <form action="../classes/login.php" method="post">
                <input 
                    type="email"
                    class="block border border-grey-light w-full p-3 rounded mb-4"
                    name="email"
                    placeholder="Email" />

                <input 
                    type="password"
                    class="block border border-grey-light w-full p-3 rounded mb-4"
                    name="password"
                    placeholder="Password" />
       

                <button 
                    name="login"
                    class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 w-full border-b-4 border-blue-700 hover:border-blue-500 rounded">
                    Log in
                    </button>
           </form>

            
        </div>

        <div class="text-grey-dark mt-6">
        
        </div>
    </div>
</div>
</body>