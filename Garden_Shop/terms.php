<?php

  session_start();

?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <title>Termes & conditions | Garden Shop</title>

        <meta name="description" content="Garden shop, la plateforme d'échange et de vente de fruits et légumes entre particulier">
        <meta name="author" content="Evelyne Dubois">
        <meta name="keywords" content="Garden Shop, fruits, légumes, échanger, vendre, donner, potager, jardins, graines, confitures, jardiner, jardinage, verger, bio">

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        
        <link rel="icon" href="images/favicon.ico"/>

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    </head>
 
    <body>

    	<header>
            <div class="container">
                <nav id="main-menu">
                    <ul id="main-menu_links">
                        <li><a href="acheter.php">Acheter<span>des produits</span></a></li>
                        <li><a href="
                          <?php 
                            if(isset($_SESSION["id"])){

                              if(isset($_SESSION["shop"]) && $_SESSION["shop"] != "" ){
                                echo 'vendre.php';
                              }else{
                                echo '#create_shop-popup" class="open-popup-link';
                              }
                            }else{
                              echo '#connexion-popup" class="open-popup-link';
                            }
                          ?>
                          ">Vendre<span>ses récoltes</span></a></li>
                        <li><a href="cueillettes.php">Cueillir<span class="spacing">soi-même</span></a></li>
                    </ul>
                    <a id="logo" href="index.php">Garden Shop</a>
                    <ul id="main-menu_account">
                      <?php
                        if(isset($_SESSION["user"])){
                          echo '<li><a href="profil.php">'.$_SESSION["user"].'</a></li>';
                          echo '<li><a href="logout.php">Se déconnecter</a></li>';
                        }else{
                          echo '<li><a class="open-popup-link" href="#connexion-popup">se connecter / s\'inscrire</a></li>';
                        }
                      ?>
                    </ul>
                </nav>

                <nav id="main-menu-smartphone">

                    <a id="logo-smartphone" href="index.php">Garden Shop</a>
                    <ul id="main-menu-account-smartphone">
                      <?php
                        if(isset($_SESSION["user"])){
                          echo '<li><a href="profil.php">'.$_SESSION["user"].'</a></li>';
                          echo '<li><a href="logout.php">Se déconnecter</a></li>';
                        }else{
                          echo '<li><a class="open-popup-link" href="#connexion-popup">se connecter<span class="smartphone-380-hide"> / s\'inscrire</span></a></li>';
                        }
                      ?>
                    </ul>

                    <ul id="main-menu-links-smartphone">
                        <li><a  href="acheter.php">Acheter</a></li>
                        <li class="text-center"><a href="
                          <?php 
                            if(isset($_SESSION["id"])){

                              if(isset($_SESSION["shop"]) && $_SESSION["shop"] != "" ){
                                echo 'vendre.php';
                              }else{
                                echo '#create_shop-popup" class="open-popup-link';
                              }
                            }else{
                              echo '#connexion-popup" class="open-popup-link';
                            }
                          ?>
                          ">Vendre</a></li>
                        <li class="text-right"><a href="cueillettes.php">Cueillettes</a></li>
                    </ul>
                    
                </nav>
            </div>
    	</header>

      <iframe id="connexion-popup" class="white-popup mfp-hide" src="connexion.view.php" scrolling="no";></iframe>
      <iframe id="create_shop-popup" class="white-popup mfp-hide" src="create-shop.view.php" scrolling="no";></iframe>

        <div id="banner" class="banner-home banner-contact"></div>

        <div class="container">
            <div id="content" class="terms">
              
              <h2>Termes et confitions</h2>

              <h3>1. Présentation du site.</h3>

              <p>En vertu de l'article 6 de la loi n° 2004-575 du 21 juin 2004 pour la confiance dans l'économie numérique, il est précisé aux utilisateurs du site http://www.evelynedubois.be/tfe/ l'identité des différents intervenants dans le cadre de sa réalisation et de son suivi :</p>

              <p>Propriétaire : Evelyne Dubois</p>
              <p>Créateur : Evelyne Dubois</p>
              <p>Responsable publication : Evelyne Dubois – evelyne.dubois.89@gmail.com</p>
              <p>Le responsable publication est une personne physique ou une personne morale.</p>
              <p>Webmaster : Evelyne Dubois – evelyne.dubois.89@gmail.com</p>
              <p>Crédits : les mentions légales ont étés générées et offertes par SubDelirium Agence Communication Angoulême.</p>
              <p>Hébergeur : OVH – 2 rue Kellermann - 59100 Roubaix - France</p>

              <h3>2. Conditions générales d’utilisation du site et des services proposés.</h3>
              <p>L’utilisation du site http://www.evelynedubois.be/tfe/ implique l’acceptation pleine et entière des conditions générales d’utilisation ci-après décrites. Ces conditions d’utilisation sont susceptibles d’être modifiées ou complétées à tout moment, les utilisateurs du site http://www.evelynedubois.be/tfe/ sont donc invités à les consulter de manière régulière.</p>

              <p>Ce site est normalement accessible à tout moment aux utilisateurs. Une interruption pour raison de maintenance technique peut être toutefois décidée par http://www.evelynedubois.be/tfe/, qui s’efforcera alors de communiquer préalablement aux utilisateurs les dates et heures de l’intervention.</p>

              <p>Le site http://www.evelynedubois.be/tfe/ est mis à jour régulièrement par Evelyne Dubois. De la même façon, les mentions légales peuvent être modifiées à tout moment : elles s’imposent néanmoins à l’utilisateur qui est invité à s’y référer le plus souvent possible afin d’en prendre connaissance.</p>

              <h3>3. Description des services fournis.</h3>
              <p>Le site http://www.evelynedubois.be/tfe/ a pour objet de fournir une information concernant l’ensemble des activités de la société.</p>

              <p>Evelyne Dubois s’efforce de fournir sur le site http://www.evelynedubois.be/tfe/ des informations aussi précises que possible. Toutefois, il ne pourra être tenue responsable des omissions, des inexactitudes et des carences dans la mise à jour, qu’elles soient de son fait ou du fait des tiers partenaires qui lui fournissent ces informations.</p>

              <p>Tous les informations indiquées sur le site http://www.evelynedubois.be/tfe/ sont données à titre indicatif, et sont susceptibles d’évoluer. Par ailleurs, les renseignements figurant sur le site http://www.evelynedubois.be/tfe/ ne sont pas exhaustifs. Ils sont donnés sous réserve de modifications ayant été apportées depuis leur mise en ligne.</p>

              <h3>4. Limitations contractuelles sur les données techniques.</h3>
              <p>Le site utilise la technologie JavaScript.</p>

              <p>Le site Internet ne pourra être tenu responsable de dommages matériels liés à l’utilisation du site. De plus, l’utilisateur du site s’engage à accéder au site en utilisant un matériel récent, ne contenant pas de virus et avec un navigateur de dernière génération mis-à-jour.</p>

              <h3>5. Propriété intellectuelle et contrefaçons.</h3>
              <p>Evelyne Dubois est propriétaire des droits de propriété intellectuelle ou détient les droits d’usage sur tous les éléments accessibles sur le site, notamment les textes, images, graphismes, logo, icônes, sons, logiciels.</p>

              <p>Toute reproduction, représentation, modification, publication, adaptation de tout ou partie des éléments du site, quel que soit le moyen ou le procédé utilisé, est interdite, sauf autorisation écrite préalable de : Evelyne Dubois.</p>

              <p>Toute exploitation non autorisée du site ou de l’un quelconque des éléments qu’il contient sera considérée comme constitutive d’une contrefaçon et poursuivie conformément aux dispositions des articles L.335-2 et suivants du Code de Propriété Intellectuelle.</p>

              <h3>6. Limitations de responsabilité.</h3>
              <p>Evelyne Dubois ne pourra être tenue responsable des dommages directs et indirects causés au matériel de l’utilisateur, lors de l’accès au site Evelyne Dubois, et résultant soit de l’utilisation d’un matériel ne répondant pas aux spécifications indiquées au point 4, soit de l’apparition d’un bug ou d’une incompatibilité.</p>

              <p>Evelyne Dubois ne pourra également être tenue responsable des dommages indirects (tels par exemple qu’une perte de marché ou perte d’une chance) consécutifs à l’utilisation du site http://www.evelynedubois.be/tfe/.</p>

              <p>Des espaces interactifs (possibilité de poser des questions dans l’espace contact) sont à la disposition des utilisateurs. Evelyne Dubois se réserve le droit de supprimer, sans mise en demeure préalable, tout contenu déposé dans cet espace qui contreviendrait à la législation applicable en France, en particulier aux dispositions relatives à la protection des données. Le cas échéant, Evelyne Dubois se réserve également la possibilité de mettre en cause la responsabilité civile et/ou pénale de l’utilisateur, notamment en cas de message à caractère raciste, injurieux, diffamant, ou pornographique, quel que soit le support utilisé (texte, photographie…).</p>

              <h3>7. Gestion des données personnelles.</h3>
              <p>En France, les données personnelles sont notamment protégées par la loi n° 78-87 du 6 janvier 1978, la loi n° 2004-801 du 6 août 2004, l'article L. 226-13 du Code pénal et la Directive Européenne du 24 octobre 1995.</p>

              <p>A l'occasion de l'utilisation du site http://www.evelynedubois.be/tfe/, peuvent êtres recueillies : l'URL des liens par l'intermédiaire desquels l'utilisateur a accédé au site http://www.evelynedubois.be/tfe/, le fournisseur d'accès de l'utilisateur, l'adresse de protocole Internet (IP) de l'utilisateur.</p>

              <p>En tout état de cause Evelyne Dubois ne collecte des informations personnelles relatives à l'utilisateur que pour le besoin de certains services proposés par le site http://www.evelynedubois.be/tfe/. L'utilisateur fournit ces informations en toute connaissance de cause, notamment lorsqu'il procède par lui-même à leur saisie. Il est alors précisé à l'utilisateur du site http://www.evelynedubois.be/tfe/ l’obligation ou non de fournir ces informations.</p>

              <p>Conformément aux dispositions des articles 38 et suivants de la loi 78-17 du 6 janvier 1978 relative à l’informatique, aux fichiers et aux libertés, tout utilisateur dispose d’un droit d’accès, de rectification et d’opposition aux données personnelles le concernant, en effectuant sa demande écrite et signée, accompagnée d’une copie du titre d’identité avec signature du titulaire de la pièce, en précisant l’adresse à laquelle la réponse doit être envoyée.</p>

              <p>Aucune information personnelle de l'utilisateur du site http://www.evelynedubois.be/tfe/ n'est publiée à l'insu de l'utilisateur, échangée, transférée, cédée ou vendue sur un support quelconque à des tiers. Seule l'hypothèse du rachat de Evelyne Dubois et de ses droits permettrait la transmission des dites informations à l'éventuel acquéreur qui serait à son tour tenu de la même obligation de conservation et de modification des données vis à vis de l'utilisateur du site http://www.evelynedubois.be/tfe/.</p>

              <p>Le site n'est pas déclaré à la CNIL car il ne recueille pas d'informations personnelles.</p>

              <p>Les bases de données sont protégées par les dispositions de la loi du 1er juillet 1998 transposant la directive 96/9 du 11 mars 1996 relative à la protection juridique des bases de données.</p>

              <h3>8. Liens hypertextes et cookies.</h3>
              <p>Le site http://www.evelynedubois.be/tfe/ contient un certain nombre de liens hypertextes vers d’autres sites, mis en place avec l’autorisation de Evelyne Dubois. Cependant, Evelyne Dubois n’a pas la possibilité de vérifier le contenu des sites ainsi visités, et n’assumera en conséquence aucune responsabilité de ce fait.</p>

              <p>La navigation sur le site http://www.evelynedubois.be/tfe/ est susceptible de provoquer l’installation de cookie(s) sur l’ordinateur de l’utilisateur. Un cookie est un fichier de petite taille, qui ne permet pas l’identification de l’utilisateur, mais qui enregistre des informations relatives à la navigation d’un ordinateur sur un site. Les données ainsi obtenues visent à faciliter la navigation ultérieure sur le site, et ont également vocation à permettre diverses mesures de fréquentation.</p>

              <p>Le refus d’installation d’un cookie peut entraîner l’impossibilité d’accéder à certains services. L’utilisateur peut toutefois configurer son ordinateur de la manière suivante, pour refuser l’installation des cookies :</p>
              <p>Sous Internet Explorer : onglet outil / options internet. Cliquez sur Confidentialité et choisissez Bloquer tous les cookies. Validez sur Ok.</p>
              <p>Sous Netscape : onglet édition / préférences. Cliquez sur Avancées et choisissez Désactiver les cookies. Validez sur Ok.</p>

              <h3>9. Droit applicable et attribution de juridiction.</h3>
              <p>Tout litige en relation avec l’utilisation du site http://www.evelynedubois.be/tfe/ est soumis au droit français. Il est fait attribution exclusive de juridiction aux tribunaux compétents de Paris.</p>

              <h3>10. Les principales lois concernées.</h3>
              <p>Loi n° 78-87 du 6 janvier 1978, notamment modifiée par la loi n° 2004-801 du 6 août 2004 relative à l'informatique, aux fichiers et aux libertés.</p>

              <p>Loi n° 2004-575 du 21 juin 2004 pour la confiance dans l'économie numérique.</p>

              <h3>11. Lexique.</h3>
             <p>Utilisateur : Internaute se connectant, utilisant le site susnommé.</p>

              <p>Informations personnelles : « les informations qui permettent, sous quelque forme que ce soit, directement ou non, l'identification des personnes physiques auxquelles elles s'appliquent » (article 4 de la loi n° 78-17 du 6 janvier 1978).</p>
          

            </div><!-- content -->
        </div><!-- container -->

        <footer>
          <div class="container">
            <ul id="footer-menu">
              <li><a href="contact.php">Contact</a></li>
              <li><a class="current" href="terms.php">Termes et conditions</a></li>
            </ul>
            <strong>Garden Shop ©2014</strong>
          </div>
        </footer>

        <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
        <script src="js/jquery.magnific-popup.js"></script>
        <script src="js/script.js"></script>
        <!--[if lt IE 10]><script src="js/script_ie.js"></script><![endif]-->

    </body>
</html>