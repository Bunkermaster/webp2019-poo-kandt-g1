# Export / Import MySQL

## Export (à chaud, la base tourne)
commande mysqldump de MySQL :
* Mac: ```/Applications/MAMP/Library/bin/mysqldump```
* Windows: ```(repertoire d'installation)/bin/mysql/bin/mysqldump.exe```

### Exporter dans le terminal
```bash
$ mysqldump -uroot -p ma-bdd
```
### Exporter dans un fichier
```bash
$ mysqldump -uroot -p ma-bdd > unfichier.sql 
```
### Exporter à la fin d'un fichier
```bash
$ mysqldump -uroot -p ma-bdd >> unfichier.sql 
```

## Importer (à chaud, du'h)
Commande mysql de MySQL:
* Mac: ```/Applications/MAMP/Library/bin/mysql```
* Windows: ```(repertoire d'installation)/bin/mysql/bin/mysql.exe```

## Importer un fichier du terminal
```bash
$ mysql -uroot -p ma-bdd < mon-fichier.sql
```
## Importer un fichier de la console MySQL
```mysql
source mon-fichier.sql
```