/*jshint newcap:false*/

// controller.js
//------------------------------
//
// 2013-02-13, Jonas Colmsjö
//
// The Controller object in the MVC model
//
// Documentation is 'docco style' - http://jashkenas.github.com/docco/
//
// Using Google JavaScript Style Guide - http://google-styleguide.googlecode.com/svn/trunk/javascriptguide.xml
//
//------------------------------


'use strict';

// .bind shim for IE8
if (!Function.prototype.bind) {
    Function.prototype.bind = function(context) {
        var self = this;
        return function() {
            return self.apply(context, arguments);
        };
    };
}

// The Controller object which creates a View and Model
var FortnoxController = Stapes.subclass({

    'constructor' : function() {
        this.view  = new FortnoxView();
        this.store = new FortnoxStore();
        this.model = new FortnoxModel( this.store.load() );

        this.bindEventHandlers();

    },

    'bindEventHandlers': function() {
        this.on({
            'database_id_update': function(value) {
                logDebug('Controller received database_id_update: '+ value);
            }
        });

        this.view.on({
            'database_id_update': function() {
                logDebug('View received database_id_update:' + value);
            }

        }, this);
    }

});