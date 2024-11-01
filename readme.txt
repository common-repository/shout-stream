=== Shout Stream ===

Contributors: ..::DeUCeD::..
Tags: widget, shoutcast, icecast, stream, audio, ffmp3, flash
Requires at least: 2.2
Tested up to: 2.9.1
Stable tag: trunk
Donate link: 

Shout Streams is the bridge between your shoutcast or icecast stream and WordPress!

== Description ==

Shout Stream plugin is a plugin that embeds FFmp3 flash player OR mini Media Player OR Minicaster Flash player at your sidebar or at a page to connect to a stream (shoutcast or icecast) along with LIVE stats. It has also links for a popup windows for each stream so your readers could surf at your blog without stopping hearing the stream. As more feautures are being added i advise that you read all available info at the plugin's page. 

From version 3 and above Shout Stream will use FFmp3 flash player. Minicaster and Media player are still supported but eventually they will be depreciated. FFmp3 is open source and avoids memory leaks by cleaning buffer in a seamless way. More info @ Shout Stream pages.

Have fun and keep blogging!

== Installation ==

**Installation**

1. Decompress and upload the folder shout-stream to the /wp-content/plugins/ directory.
2. Activate the plugin through the **Plugins** menu in WordPress.
3. Configure the plugin at its own configuration page under settings and also configure the widget.

== Screenshots ==

Available at the plugin page: http://deuced.net/shout-stream/ 

== Frequently Asked Questions ==

**Upgrading**

1. Deactivate the plugin through the **Plugins** menu in WordPress.
2. Delete the folder shout-stream from your /wp-content/plugins/ directory.
3. Decompress and upload the new folder shout-stream to the /wp-content/plugins/ directory.
4. Activate the plugin through the **Plugins** menu in WordPress.
5. Reconfigure the plugin at its own configuration page under settings and also configure the widget.

**Unistallation**

1. Go at settings, find configuration page and first **RESET ALL VALUES**.
2. Deactivate the plugin through the **Plugins** menu in WordPress.
3. Delete the folder shout-stream from your /wp-content/plugins/ directory.

More FAQ @ plugin's page: http://deuced.net/shout-stream/ 

== Changelog ==

= 3.3 =
Icons for popups, fixed a bug in JS, better support icecast/niceast stats.
= 3.2 =
Bug in media player on static page fixed, added autoplay value in popup window.
= 3.1 =
Bug in alternative streams and popup windows, solved.
= 3.0 =
This is a major release of Shout Stream. FFmp3 flash player has been included with some skins and the ability to make your own easily. FFmp3 solves the memory leaking problem when streaming and using flash client to listen. 

Visit the plugin page: http://deuced.net/shout-stream/  

== Upgrade Notice ==

= 3.0 =
Version 3.0 uses FFmp3 flash player which is open source and a solution to memory leaking problem that most flash players are dealing with when opening a stream!

== Credits ==

Fbricker, the developer of **FFmp3** flash player is the main person that i own lots of thanks. New open source FFmp3 flash player (http://ffmp3.sourceforge.net/) solved lots of trouble. Alsoany thanks to Draftlight Networks DNeX Group (http://www.draftlight.net/ ).
For the dynamic stats i have used the code from Dynamic Ajax Content script which was @ Dynamic Drive website. More info can be found at http://www.dynamicdrive.com/

== KEEP IN MIND ==

This plugin is tested in my installation only. That means you must better test it before you use it even though it doesn't seem to interfere with other plugins. As far as i know it is compatible with all the plugins i use and you could check mines at my plugins page. But i recommend that you deactivate any plugins that do a similar job aiming the same purpose. As we all know, BACKUP AND TRY IT BEFORE YOU USE IT! You are the only responsible person for your DATA.

Copyright 2008-2009-2010 ..::DeUCeD::..

*This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.
This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.
You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA.*