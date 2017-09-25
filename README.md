simple flex project without easyadminBundle

Small project with a single entity Contact and without easyadminBundle

*/ First stage installation of the project:

Composer create-project symfony/skeleton projectName

*/ move on the project and type  `make serve`

*/ the project starts on localhost:8000

*/ bundles instalattion "no need to add the configuration to the bundle installation"

    - composer req webserver  "this will install a web server and especially bin / console to use the symfony commands"
    - composer req twig     "for use of twig, this will install the templates folder"
    - composer req doctrine "for use of doctrine and a database
             this will install the entity and repository folder in /src"
    - composer req symfony/form "for use of symfony forms it may be that the instalation fails in this case
             it is necessary to install `translator` and `validator` with the same procedure composer req "

*/ for the creation of the database it is necessary to add url mysql in the .env in the part doctrine bundle

    - DATABASE_URL="mysql://root:Password@127.0.0.1:3306/DatabaseName?charset=utf8mb4&serverVersion=5.7"
    - type `bin/console doctrine:database:create`

*/ for entities they must be created manually in the entities folder and type :

    - bin/console doctrine:schema:update --force

*/ the configuration of each bundle is separated in this flex version and is located in /config/packages

*/ appkernel is replaced by /config/bundles.php "the list of bundles"









