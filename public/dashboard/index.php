<?php
include  '../../snippets/header.php' ;
?>
 <!-- Main -->
    <?php
    include  '../../businessLogic/database/Generic.php' ;
    include  '../../businessLogic/database/User.php' ;
    include  "../../businessLogic/utils/Generators.php" ;
    if (!isset($_COOKIE)) {
        print( 'You are not logged in' );
        header( 'Location: /auth/signin.php' );
    } else {
        if (isset($_COOKIE[ 'user' ])) {
            $um = new User();
            if ($um->checkUser($_COOKIE[ 'user' ])) {
                $user = $um->getUser($_COOKIE[ 'user' ]);
                print( 'Welcome ' . $user->name . ' ' . $user->surname );
            } else {
                print( 'User does not exist' );
                header( 'Location: /auth/signup.php' );
            }
        }
    }
    ?>
    <main class="container">
        <article class="">
            <div>
                <hgroup>
                    <h1>Dashboard</h1>
                    <h2>Benvenuto nella tua dashboard</h2>
                </hgroup>
                <form method="post" enctype="multipart/form-data" action="index.php" >
                    <button type="submit" class="contrast">Logout</button>
                </form>
            </div>
        </article>
    </main>
<?php
include  '../../snippets/footer.php' ;
?>
