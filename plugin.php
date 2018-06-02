<?php

  /**
    This is the SearchWidget plugin.

    This file contains the SearchWidget plugin. It provides a widget that prints a search form.

    @package urlaube\searchwidget
    @version 0.1a2
    @author  Yahe <hello@yahe.sh>
    @since   0.1a0
  */

  // ===== DO NOT EDIT HERE =====

  // prevent script from getting called directly
  if (!defined("URLAUBE")) { die(""); }

  if (!class_exists("SearchWidget")) {
    class SearchWidget extends Base implements Plugin {

      // RUNTIME FUNCTIONS

      public static function plugin() {
        $result = new Content();

        $result->set(CONTENT, fhtml("<form action=\"%s\" id=\"searchwidget\" method=\"post\">".NL.
                                    "  <div class=\"input-group\">".NL.
                                    "    <input class=\"form-control\" name=\"search\" type=\"text\">".NL.
                                    "      <span class=\"input-group-btn\">".NL.
                                    "        <button class=\"btn btn-default\" type=\"submit\">".NL.
                                    "          <span class=\"glyphicon glyphicon-search\"></span>".NL.
                                    "        </button>".NL.
                                    "      </span>".NL.
                                    "  </div>".NL.
                                    "</form>",
                                    Main::ROOTURI()."search/"));
        $result->set(TITLE,   t("Suche", "SearchWidget"));

        return $result;
      }

    }

    // register plugin
    Plugins::register("SearchWidget", "plugin", ON_WIDGETS);

    // register translation
    Translate::register(__DIR__.DS."lang".DS, "SearchWidget");
  }

