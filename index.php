<?php 
session_start();
session_destroy();
$connexion = true;
?>

<html lang="fr" class="">
    
    <head>
        <meta charset="UTF-8">
        <title>Connexion</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/style.css">
    </head>

    <body style="display: flex; justify-content: center; align-items: center">
            <section style="display:flex; justify-content:space-evenly; flex-wrap:wrap">
                <div class="card" style="width: 55rem; border-radius:16px; box-shadow: 4px 4px 32px 0px rgba(0, 0, 0, 0.25)">
                <div class="container">
                    <img style='margin-top:1rem; border-radius:16px 16px 16px 16px; width:100%; height:20rem; object-fit:cover;' src='images/login.jpg'>
                    <div class="title">CONNEXION</div>
                </div>

                        <form method="post" action="post_connexion.php?user=client" style="padding: 0px 50px 0px 50px">
                            <fieldset>
                                <legend style="text-align:center">IDENTIFIANTS DE CONNEXION</legend>
                                <div>
                                    <label for="pseudo">ADRESSE EMAIL</label>
                                </div>
                                <div>
                                    <input style="width:100%;" placeholder="exemple@mail.com" class="casesinput" type="email" name="mail" id="mail" value="<?php  if(isset($_COOKIE['mail'])){ echo $_COOKIE['mail'];}?>" required/>
                                </div>
                                <br>
                                <div>
                                    <label for="pass">MOT DE PASSE</label>
                                </div>
                                <div>
                                    <input style="width:100%" class="casesinput" type="password" name="pass" id="pass" required/>
                                </div>
                            </fieldset>
                            <p>
                                <input class="btn btn-success bouton" style="background-color:#0077B6; border:0px; border-radius:8px; width:100%" type="submit" name="bouton" value=" CONNEXION "><br><br>        
                            </p>
        	            </form>
                </div>
            </section>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>