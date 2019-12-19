<?php
    require_once ("bd_connect.php");

    if (isset($_POST['submit_connect']) ){
        $form_valid = TRUE;

        // Protection contre les caractères spéciaux & espaces début et fin
        $login = htmlentities(trim($_POST['login']));
        
        // Cryptage du mdp
       
        $password = trim($_POST['password']);
        
        //Vérif d'un formulaire incomplet
        if (empty($_POST["login"]) OR empty($_POST["password"])){
            echo "Pseudonyme et/ou mot de passe vide(s)";
            $form_valid = FALSE;
        }

        //Recherche le login dans la bdd

        if ($form_valid){
            try{
                $req_prep = $conn->prepare(
                    "SELECT login_user, password_user,firstname_user,name_user
                     FROM user 
                     WHERE login_user =?"                      
                );

                $req_prep-> bindParam(1,$login);
                $req_prep->execute();
                $results = $req_prep ->fetchAll(\PDO::FETCH_ASSOC);
               
                if (!$results){
                    echo "Pseudonyme et/ou mot de passe incorrect(s)";
                }else{
                    foreach($results as $result){
                        if (password_verify($password,$result['password_user']))
                        {
                            $_SESSION["login"]=$login;   
                            
                            echo "Bienvenue ".$result['firstname_user']." ".$result['name_user']." !";                 
                           
                        }else{
                            echo "Pseudonyme et/ou  mot de passe incorrect(s)";
                        }
                    }    
                }
            }
            /*On capture les exceptions si une exception est lancée et on affiche
                *les informations relatives à celle-ci*/
                
            catch(PDOException $e){                
                echo "Erreur : " . $e->getMessage();
            }
        }

       
        // Requête SELECT de tous les login
    }else{
        
    }

    // On "kill" la connexion
    $conn = null;