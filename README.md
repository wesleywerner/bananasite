bananasite
==========

BananaSite is a simple php script that serves rendered markdown files. It supports site pages.

# Usage

BananaSite uses the PHP Markdown script Copyright (c) 2004-2013 Michel Fortin, available at [http://michelf.ca/projects/php-markdown/](http://michelf.ca/projects/php-markdown/)

1. Clone or download this project to your local machine.
1. Download the php markdown script mentioned above into your local site directory.
3. Create a subdirectory for each site page.
4. Edit header.md and footer.md to suit your needs.
5. Upload the directory to your hosted site.

# What this site does

* renders markdown from plaintext .md files.
* discards attempts at hacking the page paths.
* images and all other markdown supported features.

# What this site is not

* No online editor.
* No database.
* No pagination.
* No hassle.

# Adding posts

Simply write plain text markdown files into one of your post subdirectories. The files should have a .md file extension. Posts are ordered by however the filesystem returns them, thus naming your files by date would be the best way to ensure they display in the right order.

The default site is configured with an example layout for you to enjoy.

# License

    Copyright (C) 2013 Wesley Werner

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

You should receive a copy of the GNU General Public License along with this program. If not, see [http://www.gnu.org/licenses/](http://www.gnu.org/licenses/).
