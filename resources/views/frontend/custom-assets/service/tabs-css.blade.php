<style>
     

        .custom-tabs:not(.light) input[name=custom-tabs]:nth-of-type(1):checked~.nav .tab-nav:nth-of-type(1) {
            position: relative !important;
            z-index: 2;
        }

        .custom-tabs:not(.light) input[name=custom-tabs]:nth-of-type(1):checked~.nav .tab-nav:nth-of-type(1) label {
            color: #fff;
            background: linear-gradient(90deg, #00A7AC, #00A7AC);
            text-shadow: 2px 2px 1px rgba(0, 0, 0, 0.2);
            border-color: transparent;
            background-origin: border-box;
        }



        .custom-tabs:not(.light) input[name=custom-tabs]:nth-of-type(1):checked~.content .tab-content:nth-of-type(1) {
            opacity: 1 !important;
            position: relative;
            transform: translate(0);
        }

        .custom-tabs:not(.light) input[name=custom-tabs]:nth-of-type(1):checked~.content .tab-content:nth-of-type(1)>* {
            opacity: 1;
            transform: translateY(0);
            transition: all 0.25s ease-out 0.15s;
            transition: opacity 250ms ease-out, transform 250ms ease-out;
        }

        .custom-tabs:not(.light) input[name=custom-tabs]:nth-of-type(1):checked~.content .tab-content:nth-of-type(1)>*:nth-of-type(1) {
            transition-delay: 0.15s;
        }

        .custom-tabs:not(.light) input[name=custom-tabs]:nth-of-type(1):checked~.content .tab-content:nth-of-type(1)>*:nth-of-type(2) {
            transition-delay: 0.3s;
        }

        .custom-tabs:not(.light) input[name=custom-tabs]:nth-of-type(1):checked~.content .tab-content:nth-of-type(1)>*:nth-of-type(3) {
            transition-delay: 0.45s;
        }

        .custom-tabs:not(.light) input[name=custom-tabs]:nth-of-type(1):checked~.content .tab-content:nth-of-type(1)>*:nth-of-type(4) {
            transition-delay: 0.6s;
        }

        .custom-tabs:not(.light) input[name=custom-tabs]:nth-of-type(1):checked~.content .tab-content:nth-of-type(1)~.tab-content {
            transform: translate(100%);
        }

        .custom-tabs:not(.light) input[name=custom-tabs]:nth-of-type(2):checked~.nav .tab-nav:nth-of-type(2) {
            position: relative !important;
            z-index: 2;
        }

        .custom-tabs:not(.light) input[name=custom-tabs]:nth-of-type(2):checked~.nav .tab-nav:nth-of-type(2) label {
            color: #fff;
            background: linear-gradient(90deg, #00A7AC, #00A7AC);
            text-shadow: 2px 2px 1px rgba(0, 0, 0, 0.2);
            border-color: transparent;
            background-origin: border-box;
        }



        .custom-tabs:not(.light) input[name=custom-tabs]:nth-of-type(2):checked~.content .tab-content:nth-of-type(2) {
            opacity: 1 !important;
            position: relative;
            transform: translate(0);
        }

        .custom-tabs:not(.light) input[name=custom-tabs]:nth-of-type(2):checked~.content .tab-content:nth-of-type(2)>* {
            opacity: 1;
            transform: translateY(0);
            transition: all 0.25s ease-out 0.15s;
            transition: opacity 250ms ease-out, transform 250ms ease-out;
        }

        .custom-tabs:not(.light) input[name=custom-tabs]:nth-of-type(2):checked~.content .tab-content:nth-of-type(2)>*:nth-of-type(1) {
            transition-delay: 0.15s;
        }

        .custom-tabs:not(.light) input[name=custom-tabs]:nth-of-type(2):checked~.content .tab-content:nth-of-type(2)>*:nth-of-type(2) {
            transition-delay: 0.3s;
        }

        .custom-tabs:not(.light) input[name=custom-tabs]:nth-of-type(2):checked~.content .tab-content:nth-of-type(2)>*:nth-of-type(3) {
            transition-delay: 0.45s;
        }

        .custom-tabs:not(.light) input[name=custom-tabs]:nth-of-type(2):checked~.content .tab-content:nth-of-type(2)>*:nth-of-type(4) {
            transition-delay: 0.6s;
        }

        .custom-tabs:not(.light) input[name=custom-tabs]:nth-of-type(2):checked~.content .tab-content:nth-of-type(2)~.tab-content {
            transform: translate(100%);
        }

        .custom-tabs:not(.light) input[name=custom-tabs]:nth-of-type(3):checked~.nav .tab-nav:nth-of-type(3) {
            position: relative !important;
            z-index: 2;
        }

        .custom-tabs:not(.light) input[name=custom-tabs]:nth-of-type(3):checked~.nav .tab-nav:nth-of-type(3) label {
            color: #fff;
            background: linear-gradient(90deg, #00A7AC, #00A7AC);
            text-shadow: 2px 2px 1px rgba(0, 0, 0, 0.2);
            border-color: transparent;
            background-origin: border-box;
        }


        .custom-tabs:not(.light) input[name=custom-tabs]:nth-of-type(3):checked~.content .tab-content:nth-of-type(3) {
            opacity: 1 !important;
            position: relative;
            transform: translate(0);
        }

        .custom-tabs:not(.light) input[name=custom-tabs]:nth-of-type(3):checked~.content .tab-content:nth-of-type(3)>* {
            opacity: 1;
            transform: translateY(0);
            transition: all 0.25s ease-out 0.15s;
            transition: opacity 250ms ease-out, transform 250ms ease-out;
        }

        .custom-tabs:not(.light) input[name=custom-tabs]:nth-of-type(3):checked~.content .tab-content:nth-of-type(3)>*:nth-of-type(1) {
            transition-delay: 0.15s;
        }

        .custom-tabs:not(.light) input[name=custom-tabs]:nth-of-type(3):checked~.content .tab-content:nth-of-type(3)>*:nth-of-type(2) {
            transition-delay: 0.3s;
        }

        .custom-tabs:not(.light) input[name=custom-tabs]:nth-of-type(3):checked~.content .tab-content:nth-of-type(3)>*:nth-of-type(3) {
            transition-delay: 0.45s;
        }

        .custom-tabs:not(.light) input[name=custom-tabs]:nth-of-type(3):checked~.content .tab-content:nth-of-type(3)>*:nth-of-type(4) {
            transition-delay: 0.6s;
        }

        .custom-tabs:not(.light) input[name=custom-tabs]:nth-of-type(3):checked~.content .tab-content:nth-of-type(3)~.tab-content {
            transform: translate(100%);
        }

        .custom-tabs:not(.light) input[name=custom-tabs]:nth-of-type(4):checked~.nav .tab-nav:nth-of-type(4) {
            position: relative !important;
            z-index: 2;
        }

        .custom-tabs:not(.light) input[name=custom-tabs]:nth-of-type(4):checked~.nav .tab-nav:nth-of-type(4) label {
            color: #fff;
            background: linear-gradient(90deg, #00A7AC, #00A7AC);
            text-shadow: 2px 2px 1px rgba(0, 0, 0, 0.2);
            border-color: transparent;
            background-origin: border-box;
        }


        .custom-tabs:not(.light) input[name=custom-tabs]:nth-of-type(4):checked~.content .tab-content:nth-of-type(4) {
            opacity: 1 !important;
            position: relative;
            transform: translate(0);
        }

        .custom-tabs:not(.light) input[name=custom-tabs]:nth-of-type(4):checked~.content .tab-content:nth-of-type(4)>* {
            opacity: 1;
            transform: translateY(0);
            transition: all 0.25s ease-out 0.15s;
            transition: opacity 250ms ease-out, transform 250ms ease-out;
        }

        .custom-tabs:not(.light) input[name=custom-tabs]:nth-of-type(4):checked~.content .tab-content:nth-of-type(4)>*:nth-of-type(1) {
            transition-delay: 0.15s;
        }

        .custom-tabs:not(.light) input[name=custom-tabs]:nth-of-type(4):checked~.content .tab-content:nth-of-type(4)>*:nth-of-type(2) {
            transition-delay: 0.3s;
        }

        .custom-tabs:not(.light) input[name=custom-tabs]:nth-of-type(4):checked~.content .tab-content:nth-of-type(4)>*:nth-of-type(3) {
            transition-delay: 0.45s;
        }

        .custom-tabs:not(.light) input[name=custom-tabs]:nth-of-type(4):checked~.content .tab-content:nth-of-type(4)>*:nth-of-type(4) {
            transition-delay: 0.6s;
        }

        .custom-tabs:not(.light) input[name=custom-tabs]:nth-of-type(4):checked~.content .tab-content:nth-of-type(4)~.tab-content {
            transform: translate(100%);
        }

        .custom-tabs:not(.light) ul.nav {
            background: #fff;
            box-shadow: 0 6px 10px 2px #fff;
        }

        .custom-tabs:not(.light) ul.nav li.tab-nav button label {
            color: #00A7AC;
        }

        .custom-tabs:not(.light) ul.nav li.tab-nav button:hover>label,
        .custom-tabs:not(.light) ul.nav li.tab-nav button:focus>label {
            color: #00A7AC;
        }

        .custom-tabs.light input[name=custom-tabs]:nth-of-type(1):checked~.nav .tab-nav:nth-of-type(1) {
            position: relative !important;
            z-index: 2;
        }

        .custom-tabs.light input[name=custom-tabs]:nth-of-type(1):checked~.nav .tab-nav:nth-of-type(1) label {
            color: #00A7AC;
            background-color: #5FE084;
            border-color: transparent;
            background-origin: border-box;
        }


        .custom-tabs.light input[name=custom-tabs]:nth-of-type(1):checked~.content .tab-content:nth-of-type(1) {
            opacity: 1 !important;
            position: relative;
            transform: translate(0);
        }

        .custom-tabs.light input[name=custom-tabs]:nth-of-type(1):checked~.content .tab-content:nth-of-type(1)>* {
            opacity: 1;
            transform: translateY(0);
            transition: all 0.25s ease-out 0.15s;
            transition: opacity 250ms ease-out, transform 250ms ease-out;
        }

        .custom-tabs.light input[name=custom-tabs]:nth-of-type(1):checked~.content .tab-content:nth-of-type(1)>*:nth-of-type(1) {
            transition-delay: 0.15s;
        }

        .custom-tabs.light input[name=custom-tabs]:nth-of-type(1):checked~.content .tab-content:nth-of-type(1)>*:nth-of-type(2) {
            transition-delay: 0.3s;
        }

        .custom-tabs.light input[name=custom-tabs]:nth-of-type(1):checked~.content .tab-content:nth-of-type(1)>*:nth-of-type(3) {
            transition-delay: 0.45s;
        }

        .custom-tabs.light input[name=custom-tabs]:nth-of-type(1):checked~.content .tab-content:nth-of-type(1)>*:nth-of-type(4) {
            transition-delay: 0.6s;
        }

        .custom-tabs.light input[name=custom-tabs]:nth-of-type(1):checked~.content .tab-content:nth-of-type(1)~.tab-content {
            transform: translate(100%);
        }

        .custom-tabs.light input[name=custom-tabs]:nth-of-type(2):checked~.nav .tab-nav:nth-of-type(2) {
            position: relative !important;
            z-index: 2;
        }

        .custom-tabs.light input[name=custom-tabs]:nth-of-type(2):checked~.nav .tab-nav:nth-of-type(2) label {
            color: #00A7AC;
            background-color: #5FE084;
            border-color: transparent;
            background-origin: border-box;
        }


        .custom-tabs.light input[name=custom-tabs]:nth-of-type(2):checked~.content .tab-content:nth-of-type(2) {
            opacity: 1 !important;
            position: relative;
            transform: translate(0);
        }

        .custom-tabs.light input[name=custom-tabs]:nth-of-type(2):checked~.content .tab-content:nth-of-type(2)>* {
            opacity: 1;
            transform: translateY(0);
            transition: all 0.25s ease-out 0.15s;
            transition: opacity 250ms ease-out, transform 250ms ease-out;
        }

        .custom-tabs.light input[name=custom-tabs]:nth-of-type(2):checked~.content .tab-content:nth-of-type(2)>*:nth-of-type(1) {
            transition-delay: 0.15s;
        }

        .custom-tabs.light input[name=custom-tabs]:nth-of-type(2):checked~.content .tab-content:nth-of-type(2)>*:nth-of-type(2) {
            transition-delay: 0.3s;
        }

        .custom-tabs.light input[name=custom-tabs]:nth-of-type(2):checked~.content .tab-content:nth-of-type(2)>*:nth-of-type(3) {
            transition-delay: 0.45s;
        }

        .custom-tabs.light input[name=custom-tabs]:nth-of-type(2):checked~.content .tab-content:nth-of-type(2)>*:nth-of-type(4) {
            transition-delay: 0.6s;
        }

        .custom-tabs.light input[name=custom-tabs]:nth-of-type(2):checked~.content .tab-content:nth-of-type(2)~.tab-content {
            transform: translate(100%);
        }

        .custom-tabs.light input[name=custom-tabs]:nth-of-type(3):checked~.nav .tab-nav:nth-of-type(3) {
            position: relative !important;
            z-index: 2;
        }

        .custom-tabs.light input[name=custom-tabs]:nth-of-type(3):checked~.nav .tab-nav:nth-of-type(3) label {
            color: #00A7AC;
            background-color: #5FE084;
            border-color: transparent;
            background-origin: border-box;
        }

  

        .custom-tabs.light input[name=custom-tabs]:nth-of-type(3):checked~.content .tab-content:nth-of-type(3) {
            opacity: 1 !important;
            position: relative;
            transform: translate(0);
        }

        .custom-tabs.light input[name=custom-tabs]:nth-of-type(3):checked~.content .tab-content:nth-of-type(3)>* {
            opacity: 1;
            transform: translateY(0);
            transition: all 0.25s ease-out 0.15s;
            transition: opacity 250ms ease-out, transform 250ms ease-out;
        }

        .custom-tabs.light input[name=custom-tabs]:nth-of-type(3):checked~.content .tab-content:nth-of-type(3)>*:nth-of-type(1) {
            transition-delay: 0.15s;
        }

        .custom-tabs.light input[name=custom-tabs]:nth-of-type(3):checked~.content .tab-content:nth-of-type(3)>*:nth-of-type(2) {
            transition-delay: 0.3s;
        }

        .custom-tabs.light input[name=custom-tabs]:nth-of-type(3):checked~.content .tab-content:nth-of-type(3)>*:nth-of-type(3) {
            transition-delay: 0.45s;
        }

        .custom-tabs.light input[name=custom-tabs]:nth-of-type(3):checked~.content .tab-content:nth-of-type(3)>*:nth-of-type(4) {
            transition-delay: 0.6s;
        }

        .custom-tabs.light input[name=custom-tabs]:nth-of-type(3):checked~.content .tab-content:nth-of-type(3)~.tab-content {
            transform: translate(100%);
        }

        .custom-tabs.light input[name=custom-tabs]:nth-of-type(4):checked~.nav .tab-nav:nth-of-type(4) {
            position: relative !important;
            z-index: 2;
        }

        .custom-tabs.light input[name=custom-tabs]:nth-of-type(4):checked~.nav .tab-nav:nth-of-type(4) label {
            color: #00A7AC;
            background-color: #5FE084;
            border-color: transparent;
            background-origin: border-box;
        }


        .custom-tabs.light input[name=custom-tabs]:nth-of-type(4):checked~.content .tab-content:nth-of-type(4) {
            opacity: 1 !important;
            position: relative;
            transform: translate(0);
        }

        .custom-tabs.light input[name=custom-tabs]:nth-of-type(4):checked~.content .tab-content:nth-of-type(4)>* {
            opacity: 1;
            transform: translateY(0);
            transition: all 0.25s ease-out 0.15s;
            transition: opacity 250ms ease-out, transform 250ms ease-out;
        }

        .custom-tabs.light input[name=custom-tabs]:nth-of-type(4):checked~.content .tab-content:nth-of-type(4)>*:nth-of-type(1) {
            transition-delay: 0.15s;
        }

        .custom-tabs.light input[name=custom-tabs]:nth-of-type(4):checked~.content .tab-content:nth-of-type(4)>*:nth-of-type(2) {
            transition-delay: 0.3s;
        }

        .custom-tabs.light input[name=custom-tabs]:nth-of-type(4):checked~.content .tab-content:nth-of-type(4)>*:nth-of-type(3) {
            transition-delay: 0.45s;
        }

        .custom-tabs.light input[name=custom-tabs]:nth-of-type(4):checked~.content .tab-content:nth-of-type(4)>*:nth-of-type(4) {
            transition-delay: 0.6s;
        }

        .custom-tabs.light input[name=custom-tabs]:nth-of-type(4):checked~.content .tab-content:nth-of-type(4)~.tab-content {
            transform: translate(100%);
        }

        .custom-tabs.light ul.nav {
            background: #00A7AC;
            box-shadow: 0 6px 10px 2px #00A7AC;
        }

        .custom-tabs.light ul.nav li.tab-nav button label {
            color: #5FE084;
        }

        .custom-tabs.light ul.nav li.tab-nav button:hover>label,
        .custom-tabs.light ul.nav li.tab-nav button:focus>label {
            color: #4CB369;
        }

        .custom-tabs {
            position: relative;
            max-height: 100%;
            overflow: auto;
            padding: 0 10px;
            width: 100%;
        }

        .custom-tabs>input[type=radio] {
            position: absolute;
            opacity: 0;
        }

        .custom-tabs ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .custom-tabs #toggleTabsSelect {
            visibility: hidden;
        }

        .custom-tabs #toggleTabsSelect,
        .custom-tabs #toggleTabsSelect .nav li.toggle {
            display: none;
        }

        .custom-tabs>ul.nav {
            display: flex;
            justify-content: flex-start;
            margin: 0 auto 10px;
            overflow: hidden;
            padding: 10px 0 0;
            position: sticky !important;
            top: 0;
            z-index: 1;
        }

        .custom-tabs>ul.nav.static {
            top: 0 !important;
            position: relative !important;
        }

        .custom-tabs>ul.nav li.tab-nav {
            position: relative;
        }

        .custom-tabs>ul.nav li.tab-nav:first-of-type button {
            margin-left: 0;
        }

        .custom-tabs>ul.nav li.tab-nav:last-of-type button {
            margin-right: 0;
        }

        .custom-tabs>ul.nav li.tab-nav button {
            padding: 0;
            border: none;
            background: none;
            color: inherit;
            font: inherit;
            margin: 0 5px;
        }

        .custom-tabs>ul.nav li.tab-nav button label {
            font-size: 11px;
            display: block;
            padding: 2px 10px;
            cursor: pointer;
            font-weight: 700;
            border: 1px solid;
            transition: color 0.25s ease-out;
            border-radius: 30px;
        }



        .custom-tabs>ul.content {
            position: relative;
            overflow: hidden;
            padding: 0 0 10px;
            display: flex;
            height: 100%;
        }

        .custom-tabs>ul.content li.tab-content {
            opacity: 0;
            overflow: hidden;
            position: absolute;
            flex: 1 0 100%;
            transition: all 0.25s ease-out;
            transform: translate(-100%);
        }

        .custom-tabs>ul.content li.tab-content>* {
            opacity: 0;
            transform: translateY(100%);
        }

        .custom-tabs p {
            line-height: 2em;
            margin-top: 0;
        }
</style>