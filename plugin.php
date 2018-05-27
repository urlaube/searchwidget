<?php

  /**
    This is the SearchWidget plugin.

    This file contains the SearchWidget plugin. It provides a widget that prints a search form.

    @package urlaube\searchwidget
    @version 0.1a1
    @author  Yahe <hello@yahe.sh>
    @since   0.1a0
  */

  // ===== DO NOT EDIT HERE =====

  // prevent script from getting called directly
  if (!defined("URLAUBE")) { die(""); }

  if (!class_exists("SearchWidget")) {
    class SearchWidget extends Translatable implements Plugin, Translation {

      // RUNTIME FUNCTIONS

      public function plugin() {
        $result = new Content();

        $result->set(TITLE,   gl("Suche"));
        $result->set(CONTENT, "<form action=\"".html(Main::ROOTURI()."search/")."\" id=\"searchwidget\" method=\"post\">".NL.
                              "  <div class=\"input-group\">".NL.
                              "    <input class=\"form-control\" name=\"search\" type=\"text\">".NL.
                              "      <span class=\"input-group-btn\">".NL.
                              "        <button class=\"btn btn-default\" type=\"submit\">".NL.
                              "          <span class=\"glyphicon glyphicon-search\"></span>".NL.
                              "        </button>".NL.
                              "      </span>".NL.
                              "  </div>".NL.
                              "</form>");

        return $result;
      }

    }

    // instantiate translatable handler
    $plugin = new SearchWidget();
    $plugin->setTranslationsPath(__DIR__.DS."lang".DS);

    // register plugin
    Plugins::register($plugin, "plugin", ON_WIDGETS);
  }

