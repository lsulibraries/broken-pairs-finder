# broken-pairs-finder


Given a directory `/home/myusername/myproject/` with the following files:

- a.pdf
- a.txt
- b.pdf
- b.txt
- c.pdf
- d.txt

this script will print out the names of files without mates, in this case `c.pdf` and `d.txt`


Usage: 

`php match.php dir ext1 ext2`

Where 
- dir is the path to a directory containing the files to check
- ext1 is one of the extensions
- ext2 is the other

For the example directory above, the command would be `php match.php /home/myusername/myproject/ txt pdf`
