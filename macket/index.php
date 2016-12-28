<!DOCTYPE html>
<html lang="en" ng-app = "TestHub">
<head>
    <?require_once ("head.php")?>
</head>
<body>
    <div class="container col-md-12" ng-controller="pagingCtrl">
        <nav class="navbar navbar-inverse col-md-12 col-md-offset-0">
            <div class="container col-md-12 ">
                <a href="/" class="navbar-brand">TestHub</a>
                <ul class="nav navbar-nav">
                    <li ng-repeat="page in pages"><a href="#" ng-click="openStaticPage(page)">{{page.name}}</a></li>
                </ul>
            </div>
        </nav>

        <section class="panel panel-primary col-md-3 testlist">
            <div class="panel-heading row">
                <h3 class="panel-title">
                    Список тестов
                </h3>

            </div>
            <div class="panel-body">
                <ul>
                    <li ng-repeat="test in tests"><a href="#" ng-click="openTestPage(test)">{{test.name}}</a></li>
                </ul>
            </div>
        </section>
        <section class="container col-md-9">
            <div class="col-md-12" ng-show="showSp">
                <h1>{{currPage.name}}</h1>
                <p ng-bind-html="sce.trustAsHtml(currPage.content)"></p>
            </div>

            <div class="col-md-12 " ng-show="showTest">
                <h1>{{currPage.name}}</h1>
                <div class="col-md-12">
                    <div class="panel panel-primary" ng-repeat="vopros in currPage.questions">
                        <div class="panel-heading question">{{vopros.question}}</div>
                        <div class="panel-body">
                            <label class="radio col-md-11 resp" ng-repeat="resp in vopros.resp">
                                <input type="radio" name="{{vopros.question}}"  ng-model="state" ng-click="chObj(resp.id,vopros.id,currPage.id)">{{resp.resp}}
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>