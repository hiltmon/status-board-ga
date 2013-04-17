# Google Analytics for Status Board

Scripts to generate the files for presenting Google Analytics for Panic's [Status Board](http://click.linksynergy.com/fs-bin/stat?id=V41G*FiMqjc&offerid=146261&type=3&subid=0&tmpid=1826&RD_PARM1=https%253A%252F%252Fitunes.apple.com%252Fus%252Fapp%252Fstatus-board%252Fid449955536%253Fmt%253D8%2526uo%253D4%2526partnerId%253D30) app.

![](sample_board.jpg)

* 7 Day Visitor Graph (Center right)
* Top Pages (Bottom Left)
* 24 hourly window of visits (Bottom right)

**And now**

![](sample_board_1.jpg)

* Browsers
* Operating Systems

# Installation

To install, see the detailed instructions at [Google Analytics for Status Board](http://www.hiltmon.com/blog/2013/04/10/google-analytics-for-status-board/) and [Add GA OS and Browser to Status Board](http://www.hiltmon.com/blog/2013/04/17/add-ga-os-and-browser-to-status-board/).

You will need a copy of [Status Board](http://click.linksynergy.com/fs-bin/stat?id=V41G*FiMqjc&offerid=146261&type=3&subid=0&tmpid=1826&RD_PARM1=https%253A%252F%252Fitunes.apple.com%252Fus%252Fapp%252Fstatus-board%252Fid449955536%253Fmt%253D8%2526uo%253D4%2526partnerId%253D30), a [DropBox](http://www.dropbox.com) account and some Ruby-fu to make this all work.

Quick install:

Install the `json` gem:

	$ sudo gem install json

Build and install the `gattica` gem:

	$ git clone git://github.com/chrisle/gattica.git
	$ cd gattica/
	$ bundle install
	$ gem build gattica.gemspec
	$ sudo gem install gattica-0.6.2.gem
	
Update each script, replacing **email**, **password**, **title**, **file_name** and **dropbox_path**. Test run each to see that they work.

Share the files on Dropbox and email the links to your device.

Schedule the scripts to run by modifying the sample `.plists` for `launchd` or create a `crontab` entry. Then:

	$ cp com.hiltmon.status_board_ga.plist ~/Library/LaunchAgents
	$ launchctl load -w ~/Library/LaunchAgents/com.hiltmon.status_board_ga.plist

Add the linked files as graphs or tables in [Status Board](http://click.linksynergy.com/fs-bin/stat?id=V41G*FiMqjc&offerid=146261&type=3&subid=0&tmpid=1826&RD_PARM1=https%253A%252F%252Fitunes.apple.com%252Fus%252Fapp%252Fstatus-board%252Fid449955536%253Fmt%253D8%2526uo%253D4%2526partnerId%253D30)

Source can be viewed or forked via GitHub: [http://github.com/hiltmon/status-board-ga.git](http://github.com/hiltmon/status-board-ga.git).

# License
(The MIT License)

Copyright (c) 2013 Hilton Lipschitz, [http://www.hiltmon.com](http://www.hiltmon.com), [hiltmon@gmail.com](mailto:hiltmon@gmail.com).  

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the 'Software'), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED 'AS IS', WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
