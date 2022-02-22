<div class="a1">  
    <section class="loginForm a1">
    <article>
        <div class="card" style="border-radius:8px">
        <div class="container">
            <img src='images/login0.jpg'>
            <div class="title">CONNEXION</div>
        </div>
            <form method="post" action="http://gsb.mattatyalexis.fr/?c=compte&a=login">
                <fieldset>
                    <legend>IDENTIFIANTS DE CONNEXION</legend>
                    <div>
                    <label for="mail">ADRESSE EMAIL</label>
                    </div>
                    <div>
                    <input placeholder="exemple@mail.com" class="casesinput" type="email" name="mail" id="mail" value="<?php  if(isset($_SESSION['mail'])){ echo $_SESSION['mail'];}?>" required/>
                    </div><br>
                    <div>
                    <label for="pass">MOT DE PASSE</label>
                    </div>
                    <div>
                    <input class="casesinput" type="password" name="pass" id="pass" required/>
                    </div>
                </fieldset><br>
                    <input class="btn btn-primary bouton" type="submit" name="bouton" value=" CONNEXION "><br><br>        
            </form>
        </div>
    </article>
    </section>
</div>