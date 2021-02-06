This Github repository is for training purposes, it allows me to improve my skills in Symfony, and is therefore continuously evolving.

The theme is about series (tv, netflix, ..) that's why the "uploads" folder displaying all the posters and images of the series is ignored in the commits for copyright reasons.

---------------------------

Ce dépot Github est à but d'entrainement, il me permet d'ameliorer mes compétences en Symfony, et est donc en évolution continuellement.

Le theme est sur les séries (tv, netflix, ..) c'est pourquoi le dossier "uploads" affichant toutes les affiches et images des séries, est ignoré dans les commits pour des raisons de droit d'auteur.

<h2>PROJECT RESOURCES</h2>
There is a folder in the project nammed 'ressources' a folder with every steps of the project like (mcd/mld/wireframe, etc...)
https://github.com/AxelRaboit/Projet_4_MovieBox/tree/master/resources

<h2>HOW TO INSTALL THE PROJECT</h2>

- Git Clone this link: https://github.com/AxelRaboit/Projet_4_MovieBox.git
- Open the project with an IDE
- (The database is not available because of copyright. (if you don't have the .sql and the uploads file, ask to the github owner, and load it in your database and project))
- Create an .env.local based to the .env file, use the line 30' and comment the 31' tu only use the mysql line, put your id to connect to your mysql, and use the database called "moviebox"
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
<img width="800" src="https://user-images.githubusercontent.com/66420167/107129187-e4b65c80-68c3-11eb-8ef6-85013a9ca1b5.png">

<h4>MLD</h4>
<img width="800" src="https://user-images.githubusercontent.com/66420167/107129186-e41dc600-68c3-11eb-948e-36eca60c9b40.png">

<h4>ARBORESCENCE</h4>
<img width="800" src="https://user-images.githubusercontent.com/66420167/107122604-e9b1e680-6898-11eb-8850-9e5f8c77a1c0.png">


<h2>AVANCEMENT DU PROJET</h2>

<h4>Login / Se connecter: Desktop</h4>
<img width="800" src="https://user-images.githubusercontent.com/66420167/107115435-046e6600-686d-11eb-8e6b-446138db4ff0.jpg">

<h4>Login / Se connecter: Mobile</h4>
<img width="300" src="https://user-images.githubusercontent.com/66420167/107115457-1e0fad80-686d-11eb-8369-bb1a5370f37a.jpg">

<h4>Registration / S'enregistrer: Desktop</h4>
<img width="800" src="https://user-images.githubusercontent.com/66420167/107115481-4bf4f200-686d-11eb-83b0-15e7f5b183e7.jpg">

<h4>Registration / S'enregistrer: Mobile</h4>
<img width="300" src="https://user-images.githubusercontent.com/66420167/107115500-64fda300-686d-11eb-8e09-df1fd6f83094.jpg">

<h4>HomePage / Page d'accueil: Desktop</h4>
<img width="800" src="https://user-images.githubusercontent.com/66420167/107129858-d1f25680-68c8-11eb-81be-5e931ffbee9d.jpg">

<h4>HomePage / Page d'accueil: Mobile</h4>
<img width="300" src="https://user-images.githubusercontent.com/66420167/107129789-5690a500-68c8-11eb-8989-61d0d273d0b6.jpg">

<h4>All Programs / Toutes les séries: Desktop</h4>
<img width="800" src="https://user-images.githubusercontent.com/66420167/107129800-73c57380-68c8-11eb-90e4-96b3045f2413.jpg">

<h4>All Programs / Toutes les séries: Mobile</h4>
<img width="300" src="https://user-images.githubusercontent.com/66420167/107129803-7627cd80-68c8-11eb-8922-18be81bb8603.jpg">

<h4>Program Show / Page de la série: Desktop</h4>
<img width="800" src="https://user-images.githubusercontent.com/66420167/107129817-8fc91500-68c8-11eb-85ad-361b5bf5a1ca.jpg">

<h4>Program Show / Page de la série: Mobile</h4>
<img width="300" src="https://user-images.githubusercontent.com/66420167/107129819-9192d880-68c8-11eb-8aa2-35a416d67a3e.jpg">

<h4>Program Show / Page de la série: Mobile</h4>
<img width="300" src="https://user-images.githubusercontent.com/66420167/107129821-92c40580-68c8-11eb-89be-62520562a746.jpg">

<h4>Program Show / Page de la série: Mobile</h4>
<img width="300" src="https://user-images.githubusercontent.com/66420167/107129823-948dc900-68c8-11eb-960e-9f37c41c2370.jpg">

<h4>Program Show / Page de la série: Mobile</h4>
<img width="300" src="https://user-images.githubusercontent.com/66420167/107129825-96578c80-68c8-11eb-8ef0-27cb6509c597.jpg">

<h4>Season Show / Page de la saison: Desktop</h4>
<img width="800" src="https://user-images.githubusercontent.com/66420167/107129906-18e04c00-68c9-11eb-8c4b-4736bdce0e27.jpg">

<h4>Season Show / Page de la saison: Mobile</h4>
<img width="300" src="https://user-images.githubusercontent.com/66420167/107129907-1a117900-68c9-11eb-9623-f54bbca797a2.jpg">

<h4>Episode Show / Page des episodes: Desktop</h4>
<img width="800" src="https://user-images.githubusercontent.com/66420167/107129924-50e78f00-68c9-11eb-9448-c3e704f367a2.jpg">

<h4>Episode Show / Page des episodes: Mobile</h4>
<img width="300" src="https://user-images.githubusercontent.com/66420167/107129926-5218bc00-68c9-11eb-9c85-8e6eb5342a19.jpg">

<h4>All Actors / Tout les acteurs: Desktop</h4>
<img width="800" src="https://user-images.githubusercontent.com/66420167/107129935-63fa5f00-68c9-11eb-9c35-4b08776e8386.jpg">

<h4>All Actors / Tout les acteurs: Mobile</h4>
<img width="300" src="https://user-images.githubusercontent.com/66420167/107129936-652b8c00-68c9-11eb-906b-80f749560b5c.jpg">

<h4>Actors Show / Page de l'acteur: Desktop</h4>
<img width="800" src="https://user-images.githubusercontent.com/66420167/107129945-76749880-68c9-11eb-95b6-9be282515d72.jpg">

<h4>Actors Show / Page de l'acteur: Mobile</h4>
<img width="300" src="https://user-images.githubusercontent.com/66420167/107129946-77a5c580-68c9-11eb-8c63-0151fc9bb7b4.jpg">

<h4>Admin Panel / Panneau d'administration: Desktop</h4>
<img width="800" src="https://user-images.githubusercontent.com/66420167/107129997-e2570100-68c9-11eb-8692-52135b1275cf.jpg">

<h4>Admin Panel / Panneau d'administration: Mobile</h4>
<img width="300" src="https://user-images.githubusercontent.com/66420167/107129995-e1be6a80-68c9-11eb-9a72-554e5d0182c6.jpg">

<h4>Easy Admin / Panneau d'administration Easy Admin: Desktop</h4>
<img width="800" src="https://user-images.githubusercontent.com/66420167/107115766-2832ab80-686f-11eb-973b-f15fd70b1bd4.jpg">

<h4>Form / Formulaire: Desktop</h4>
<img width="800" src="https://user-images.githubusercontent.com/66420167/107129961-97d58480-68c9-11eb-9224-45b4b8606d33.jpg">

<h4>Form / Formulaire: Mobile</h4>
<img width="300" src="https://user-images.githubusercontent.com/66420167/107129962-9906b180-68c9-11eb-98dc-ec6c23172182.jpg">









