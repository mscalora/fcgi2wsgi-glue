#!/usr/bin/env python
# update path above as needed for custom python installations
import sys, os, importlib
from flup.server.fcgi import WSGIServer

home = os.path.expanduser('~')
app_name = os.path.basename(os.path.dirname(os.path.abspath(__file__)))
settings_name = '%s-setttings' % app_name
settings_file = os.path.join(home, "py-apps", app_name, settings_name + '.py')
if os.path.exists(settings_file):
	os.environ['APP_SETTINGS_FILE'] = settings_file

# Add a custom Python path.
sys.path.insert(0, os.path.join(home,"python27"))
sys.path.insert(13, os.path.join(home, "py-apps", app_name))

module = importlib.import_module(app_name)

if __name__ == '__main__':
    WSGIServer(module.app).run()
