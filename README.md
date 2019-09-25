# wikibase-docker

Ce repo contient une version de [`wmde/wikibase-docker`](https://github.com/wmde/wikibase-docker) customisée pour les besoins du [poc-fne](https://fil.abes.fr/2019/09/04/fne-preuve-de-concept-en-cours/). Ce README ne vise donc qu'à documenter les particularités du poc-fne, se référer à la documentation de [`wmde/wikibase-docker`](https://github.com/wmde/wikibase-docker) pour le reste.

## Installation

```sh
git clone https://github.com/abes-esr/poc-fne-wikibase-docker
cd https://github.com/abes-esr/poc-fne-wikibase-docker
# Copiez les fichier de déclaration de variables d'environement spécifique à chaque service
cp env/dot_mysql_env env/.mysql_env
cp env/dot_wb_env env/.wb_env
cp env/dot_wdqs env/.wdqs
# Puis ouvrez les dans un éditeur de texte pour les modifier selon vos besoins
```

## Utilisation

Démarrer les services en arrière plan:
```sh
docker-compose up -d
```

Certains services sont reconstruits (*build*) plutôt que d'utiliser l'image publiée par wmde sur hub.docker.com, ce afin de prendre en compte des customisations (voir ci-dessous). Pour prendre en compte de nouvelles modifications dans ces services reconstruits, il faut explicitement demander à re-build ces services:
```sh
docker-compose up --build -d
```

## Customisation

### wikibase
Le re-build de l'image est nécessaire pour pouvoir modifier le fichier `LocalSettings.php`. Les modifications pour le poc-fne sont regroupé dans le fichier [`/wikibase/1.33/bundle/LocalSettings.php.poc-fne.template`](https://github.com/abes-esr/poc-fne-wikibase-docker/blob/poc-fne/wikibase/1.33/bundle/LocalSettings.php.poc-fne.template), lequel est pris en compte par [`./wikibase/1.33/bundle/Dockerfile`](https://github.com/abes-esr/poc-fne-wikibase-docker/blob/poc-fne/wikibase/1.33/bundle/Dockerfile).
