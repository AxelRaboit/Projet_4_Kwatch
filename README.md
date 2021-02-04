This Github repository is for training purposes, it allows me to improve my skills in Symfony, and is therefore continuously evolving.

The theme is about series (tv, netflix, ..) that's why the "uploads" folder displaying all the posters and images of the series is ignored in the commits for copyright reasons.

---------------------------

Ce dépot Github est à but d'entrainement, il me permet d'ameliorer mes compétences en Symfony, et est donc en évolution continuellement.

Le theme est sur les séries (tv, netflix, ..) c'est pourquoi le dossier "uploads" affichant toutes les affiches et images des séries, est ignoré dans les commits pour des raisons de droit d'auteur.

<h2>PROJECT INSTALL</h2>

- Git Clone this link: https://github.com/AxelRaboit/Projet_4_MovieBox.git
- Open the project with an IDE
- (The database is not available because of copyright. (but if you have the .sql use it.))
- Create an .env.local based to the .env file, use the line 30' and comment the 31' tu only use the mysql line, put your id to connect to your mysql, and use the database called "moviebox"
- Run composer install
- Run yarn install
- Run symfony console d:d:c (to create the database)
- Run symfony console d:m:m (to load the migrations)
- Run symfony console d:f:l (to load the fixtures) (user fixtures)
- Run yarn encore dev
- Run yarn encore dev --watch
- Run symfony console cache:clear (to clean the symfony cache)// Optional
- Run symfony serve (to start the server)

<h2>AVANCEMENT DU PROJET</h2>

<h4>Login / Se connecter: Desktop</h4>
<img width="800" alt="loginDesktop" src="https://user-images.githubusercontent.com/66420167/106919150-28fdfd00-670a-11eb-917d-c95420bc3a5b.jpg">

<h4>Login / Se connecter: Mobile</h4>
<img width="360" alt="loginMobile" src="https://user-images.githubusercontent.com/66420167/106919260-459a3500-670a-11eb-9dbc-0e6e4ddac14e.jpg">

<h4>Registration / Inscription: Desktop</h4>
<img width="800" alt="registrationDesktop" src="https://user-images.githubusercontent.com/66420167/106919329-58ad0500-670a-11eb-987a-8167843fe076.jpg">

<h4>Registration / Inscription: Mobile</h4>
<img width="360" alt="registrationMobile" src="https://user-images.githubusercontent.com/66420167/106919413-6a8ea800-670a-11eb-8d18-17c584f96633.jpg">

<h4>Home: Desktop</h4>
<img width="800" alt="homeDesktop" src="https://user-images.githubusercontent.com/66420167/106919515-8134ff00-670a-11eb-86f4-30480e74beb8.jpg">

<h4>Home: Mobile</h4>
<img width="360" alt="homeMobile" src="https://user-images.githubusercontent.com/66420167/106919557-8e51ee00-670a-11eb-9575-2924bde4f0eb.jpg">

<h4>Programs / Toutes les séries: Desktop</h4>
<img width="800" alt="programsDesktop" src="https://user-images.githubusercontent.com/66420167/106919685-a7f33580-670a-11eb-98f9-0c662f898f95.jpg">

<h4>Programs / Toutes les séries: Mobile</h4>
<img width="360" alt="programsMobile" src="https://user-images.githubusercontent.com/66420167/106919807-c48f6d80-670a-11eb-9676-c344d7157ee1.jpg">

<h4> ProgramShow (with seasons displayed) / Série avec les saisons d'affichées: Desktop</h4>
<img width="800" alt="programsShowDesktop" src="https://user-images.githubusercontent.com/66420167/106919916-da049780-670a-11eb-92f0-422c97e2f807.jpg">

<h4>ProgramShow (with seasons displayed) / Série avec les saisons d'affichées: Mobile</h4>
<img width="360" alt="programsShowMobile" src="https://user-images.githubusercontent.com/66420167/106920064-fef90a80-670a-11eb-973d-c770a0450682.jpg">

<h4>ProgramShow (with seasons displayed) / Série avec les saisons d'affichées: Mobile</h4>
<img width="360" alt="programsShowMobile" src="https://user-images.githubusercontent.com/66420167/106920107-0c15f980-670b-11eb-9169-92be3bc55796.jpg">

<h4>ProgramShow (with seasons displayed) / Série avec les saisons d'affichées: Mobile</h4>
<img width="360" alt="programsShowMobile" src="https://user-images.githubusercontent.com/66420167/106920175-1e903300-670b-11eb-8bf8-00080c3065f4.jpg">

<h4>ProgramShow (with seasons displayed) / Série avec les saisons d'affichées: Mobile</h4>
<img width="360" alt="programsShowMobile" src="https://user-images.githubusercontent.com/66420167/106921997-dbcf5a80-670c-11eb-9b8e-866466b8d04c.jpg">

<h4>SeasonShow (with episodes displayed) / Saison avec les episodes d'affichés: Desktop</h4>
<img width="800" alt="seasonShowDesktop" src="https://user-images.githubusercontent.com/66420167/106922282-2ea91200-670d-11eb-9499-90a21674945c.jpg">

<h4>SeasonShow (with episodes displayed) / Saison avec les episodes d'affichés: Mobile</h4>
<img width="360" alt="seasonShowMobile" src="https://user-images.githubusercontent.com/66420167/106922951-dcb4bc00-670d-11eb-9fbb-9e4a01b01a47.jpg">

<h4>EpisodeShow / Episode: Desktop</h4>
<img width="800" alt="episodeShowDesktop" src="https://user-images.githubusercontent.com/66420167/106923171-184f8600-670e-11eb-9aa2-2ae9c76bde7e.jpg">

<h4>EpisodeShow / Episode: Mobile</h4>
<img width="360" alt="episodeShowMobile" src="https://user-images.githubusercontent.com/66420167/106923256-2c938300-670e-11eb-90ed-60e31811a4fb.jpg">

<h4>All Actors displayed / Tout les acteurs affichés: Desktop</h4>
<img width="800" alt="createNewProgramDesktop" src="https://user-images.githubusercontent.com/66420167/106923480-66648980-670e-11eb-9038-5061ba7e2fee.jpg">

<h4>All Actors displayed / Tout les acteurs affichés: Mobile</h4>
<img width="360" alt="createNewProgramDesktop" src="https://user-images.githubusercontent.com/66420167/106923585-85631b80-670e-11eb-88d8-058840a8f9da.jpg">

<h4>Show Actor / Affichage de l'acteur: Desktop</h4>
<img width="800" alt="createNewProgramDesktop" src="https://user-images.githubusercontent.com/66420167/106925326-4766f700-6710-11eb-99cf-f6ece2123514.jpg">

<h4>Show Actor / Affichage de l'acteur: Mobile</h4>
<img width="360" alt="createNewProgramDesktop" src="https://user-images.githubusercontent.com/66420167/106925400-59489a00-6710-11eb-991c-1e4380dd04c8.jpg">






<h4>adminPannel / Panneau d'administration: Desktop</h4>
<img width="800" alt="createNewProgramDesktop" src="https://user-images.githubusercontent.com/66420167/106924055-faceec00-670e-11eb-8cb5-3a6386123d98.jpg">

<h4>adminPannel / Panneau d'administration: Mobile</h4>
<img width="360" alt="createNewProgramDesktop" src="https://user-images.githubusercontent.com/66420167/106924149-13d79d00-670f-11eb-93aa-712983797815.jpg">

<h4>EasyAdmin Pannel / Panneau EasyAdmin: Desktop</h4>
<img width="800" alt="createNewProgramDesktop" src="https://user-images.githubusercontent.com/66420167/106924281-35d11f80-670f-11eb-96e4-357d0b65760a.jpg">

<h4>createNewProgram / Crée une nouvelle série: Desktop</h4>
<img width="800" alt="createNewProgramDesktop" src="https://user-images.githubusercontent.com/66420167/106923771-b6dbe700-670e-11eb-8b2c-b7d9c9e4abbb.jpg">

<h4>createNewProgram / Crée une nouvelle série: Mobile</h4>
<img width="360" alt="createNewProgramMobile" src="https://user-images.githubusercontent.com/66420167/106923851-c8bd8a00-670e-11eb-9328-86cc27a85d27.jpg">






<h4>editProgram / Éditer une série: Desktop</h4>
<img width="800" alt="editProgramDesktop" src="https://user-images.githubusercontent.com/66420167/106390184-72d3a400-63e7-11eb-8d2f-ba9912258cd6.jpg">

<h4>editProgram / Éditer une série: Mobile</h4>
<img width="360" alt="editProgramMobile" src="https://user-images.githubusercontent.com/66420167/106390195-7e26cf80-63e7-11eb-98ad-e6daf7e110cb.jpg">

