from fabric.api import local

#
# This is a small fabfile developed for learning purposes
#
# Examples: 
# >fab prepare_deploy
# >fab hello:name=MYNAME
#

def hello(name="world"):
    print("Hello %s!" % name)

def prepare_deploy():
#    local("./manage.py test my_app")
    local("git add -p && git commit")
    local("git push")
