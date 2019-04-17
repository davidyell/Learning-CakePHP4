# Learning CakePHP 4
This is a repository for me to play around with the latest release of the framework and try to find bugs and issues.

## Project
This simple project uses Stack Exchange as a model for the project. Using questions, answers, comments and voting.

## Installation
* Clone the project `git clone https://github.com/davidyell/Learning-CakePHP4.git`
* `composer install`
* Copy the database file from `/config/schema/cakephp4testing.dump` into your database
* Configure your database connection in `/config/app.php` under the Datasources key 
* `bin/cake server`
* Visit http://localhost:8765/

## TODO
- [ ] Tagging
- [ ] Comments
- [ ] Slugs
- [ ] Voting
- [ ] Administration
- [ ] Ajax voting
- [ ] User profile
- [ ] Status for questions and answers to allow soft delete
