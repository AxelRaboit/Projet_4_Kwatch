This Github repository is for training purposes, it allows me to improve my skills in Symfony, and is therefore continuously evolving.

The theme is about series (tv, netflix, ..) that's why the "uploads" folder displaying all the posters and images of the series is ignored in the commits for copyright reasons.

---------------------------

Ce dépot Github est à but d'entrainement, il me permet d'ameliorer mes compétences en Symfony, et est donc en évolution continuellement.

Le theme est sur les séries (tv, netflix, ..) c'est pourquoi le dossier "uploads" affichant toutes les affiches et images des séries, est ignoré dans les commits pour des raisons de droit d'auteur.

<h2>HOW TO INSTALL THE PROJECT</h2>

- Git Clone this link: https://github.com/AxelRaboit/Projet_4_Kwatch.git
- Open the project with an IDE
- (The database is not available because of copyright. (if you don't have the .sql and the uploads file, ask to the github owner, and load it in your database and project))
- Create an .env.local based to the .env file, use the line 30' and comment the 31' tu only use the mysql line, put your id to connect to your mysql, and use the database called "kwatch"
- Run composer install
- Run yarn install
- Run symfony console 'd : d : c' (to create the database)
- Run symfony console 'd : m : m' (to load the migrations)
- Run symfony console 'd : f : l' (to load the fixtures) (user fixtures)
- Run yarn encore dev
- Run yarn encore dev --watch
- Run symfony console cache:clear (to clean the symfony cache)// Optional
- Run symfony serve (to start the server)

<h2>AVANCEMENT DE LA BASE DE DONNÉE</h2>

<h4>MCD</h4>
<img width="800" src="https://user-images.githubusercontent.com/66420167/107799307-8ecb3400-6d5d-11eb-9ae6-962fbefe1a22.png">

<h4>MLD</h4>
<img width="800" src="https://user-images.githubusercontent.com/66420167/107799320-91c62480-6d5d-11eb-8ff7-5746932bcfa0.png">

<h4>ARBORESCENCE</h4>
<img width="800" src="https://user-images.githubusercontent.com/66420167/107122604-e9b1e680-6898-11eb-8850-9e5f8c77a1c0.png">


<h2>AVANCEMENT DU PROJET</h2>

<h4>Login / Se connecter: Desktop</h4>
<img width="800" src="https://user-images.githubusercontent.com/66420167/107687519-de9af400-6ca6-11eb-81f5-19753904f477.jpg">

<h4>Login / Se connecter: Mobile</h4>
<img width="300" src="https://user-images.githubusercontent.com/66420167/107687532-e0fd4e00-6ca6-11eb-970d-29ec4d2919db.jpg">

<h4>Registration / S'enregistrer: Desktop</h4>
<img width="800" src="https://user-images.githubusercontent.com/66420167/107687611-fd998600-6ca6-11eb-9147-ec8e7a1d6a39.jpg">

<h4>Registration / S'enregistrer: Mobile</h4>
<img width="300" src="https://user-images.githubusercontent.com/66420167/107687614-fe321c80-6ca6-11eb-9c3d-0c2fd5147dcd.jpg">

<h4>HomePage / Page d'accueil: Desktop</h4>
<img width="800" src="https://user-images.githubusercontent.com/66420167/107687666-10ac5600-6ca7-11eb-84ac-bc9b2dbcc258.jpg">

<h4>HomePage / Page d'accueil: Mobile</h4>
<img width="300" src="https://user-images.githubusercontent.com/66420167/107687667-11dd8300-6ca7-11eb-9caf-61ec506f53a8.jpg">

<h4>All Programs / Toutes les séries: Desktop</h4>
<img width="800" src="https://user-images.githubusercontent.com/66420167/107687719-2457bc80-6ca7-11eb-8b4e-fa5d4dfd9245.jpg">

<h4>All Programs / Toutes les séries: Mobile</h4>
<img width="300" src="https://user-images.githubusercontent.com/66420167/107687724-24f05300-6ca7-11eb-84eb-b35011ff542d.jpg">

<h4>Program Show / Page de la série: Desktop</h4>
<img width="800" src="https://user-images.githubusercontent.com/66420167/107688010-726cc000-6ca7-11eb-95b7-69645048c189.jpg">

<h4>Program Show / Page de la série: Mobile</h4>
<img width="300" src="https://user-images.githubusercontent.com/66420167/107688021-77317400-6ca7-11eb-8bf6-6b7b18447529.png">

<h4>Program Show / Page de la série: Mobile</h4>
<img width="300" src="https://user-images.githubusercontent.com/66420167/107688078-87e1ea00-6ca7-11eb-8dcf-1e049a61a7f3.png">

<h4>Program Show / Page de la série: Mobile</h4>
<img width="300" src="https://user-images.githubusercontent.com/66420167/107688082-89131700-6ca7-11eb-9119-7e45f1c7f447.png">

<h4>Season Show / Page de la saison: Desktop</h4>
<img width="800" src="https://user-images.githubusercontent.com/66420167/107688181-a2b45e80-6ca7-11eb-8b25-3e3172a947e7.jpg">

<h4>Season Show / Page de la saison: Mobile</h4>
<img width="300" src="https://user-images.githubusercontent.com/66420167/107688188-a34cf500-6ca7-11eb-9d61-ec622cad49c9.jpg">

<h4>Episode Show / Page des episodes: Desktop</h4>
<img width="800" src="https://user-images.githubusercontent.com/66420167/108212739-89d7fd00-712e-11eb-8f29-8dad8addc5c9.jpg">

<h4>Episode Show / Page des episodes: Mobile</h4>
<img width="300" src="https://user-images.githubusercontent.com/66420167/108212757-8d6b8400-712e-11eb-9421-718894fae99e.jpg">

<h4>All Actors / Tout les acteurs: Desktop</h4>
<img width="800" src="https://user-images.githubusercontent.com/66420167/111028632-258c1e80-83f8-11eb-9e79-0c3af33295d3.jpg">

<h4>All Actors / Tout les acteurs: Mobile</h4>
<img width="300" src="https://user-images.githubusercontent.com/66420167/111028637-291fa580-83f8-11eb-8d0a-562a85f73b0b.jpg">

<h4>Actors Show / Page de l'acteur: Desktop</h4>
<img width="800" src="https://user-images.githubusercontent.com/66420167/107688567-13f41180-6ca8-11eb-952b-84585f14a6fb.jpg">

<h4>Actors Show / Page de l'acteur: Mobile</h4>
<img width="300" src="https://user-images.githubusercontent.com/66420167/107688570-148ca800-6ca8-11eb-9058-0a14848d03a4.jpg">

<h4>Admin Panel / Panneau d'administration: Desktop</h4>
<img width="800" src="https://user-images.githubusercontent.com/66420167/107688679-3423d080-6ca8-11eb-939d-f7e21dc1103e.jpg">

<h4>Admin Panel / Panneau d'administration: Mobile</h4>
<img width="300" src="https://user-images.githubusercontent.com/66420167/107688682-34bc6700-6ca8-11eb-9b8a-d1a30438e326.jpg">

<h4>Easy Admin / Panneau d'administration Easy Admin: Desktop</h4>
<img width="800" src="https://user-images.githubusercontent.com/66420167/107688753-4aca2780-6ca8-11eb-9ba0-e19e5c96f29d.jpg">

<h4>Form / Formulaire: Desktop</h4>
<img width="800" src="https://user-images.githubusercontent.com/66420167/107688790-54ec2600-6ca8-11eb-9fc8-f9f315408fa1.jpg">

<h4>Form / Formulaire: Mobile</h4>
<img width="300" src="https://user-images.githubusercontent.com/66420167/107688795-561d5300-6ca8-11eb-81cc-ce1a3c8f1954.jpg">









