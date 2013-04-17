#!/usr/bin/env ruby

folder = '/Users/Hiltmon/Dropbox/Scripts'

%x{#{folder}/status_board_browsers.rb}
%x{#{folder}/status_board_ga.rb}
%x{#{folder}/status_board_hourly.rb}
%x{#{folder}/status_board_os.rb}
%x{#{folder}/status_board_pages.rb}
