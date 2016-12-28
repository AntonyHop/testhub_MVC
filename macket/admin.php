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
                <li><a style="z-index: 10000;" class="add_btn" ng-click="createPage()">Добавить</a></li>
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
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon  glyphicon-pencil"></i></span>
                <input type="text" class="form-control" placeholder="Название страници" aria-describedby="sizing-addon1" ng-model="currPage.name">
            </div>
            <div class="textCon">
                <text-angular ng-model="currPage.content"></text-angular>
            </div>
            <div class="btn-group col-md-offset-9" role="group" aria-label="...">
                <button class="btn btn-primary btn-lg save" ng-click="savePage(addMode)">{{save}}</button>
                <button class="btn btn-danger  btn-lg save" ng-click="dellPage(currPage)">{{dell}}</button>
            </div>
        </div>
        
        <div class="col-md-12 " ng-show="showTest">
            <h1>{{currPage.name}}</h1>

            <div class="col-md-12">
                <div class="panel panel-primary" ng-repeat="vopros in currPage.questions">
                    <div class="panel-heading question">
                        {{vopros.question}}
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-list" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="Username" aria-describedby="sizing-addon1" ng-model="vopros.question">
                              <span class="input-group-addon" id="sizing-addon1">
                                   <a class="btn-danger remove-q" ng-click="dellOneQues(vopros)"><i class="glyphicon glyphicon-remove"></i></a>
                              </span>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="input-group clear" ng-repeat="resp in vopros.resp">
                                  <span class="input-group-addon">
                                      <button class="btn-danger" ng-click="dellOneResp(resp,vopros)"><i class="glyphicon glyphicon-remove"></i></button>
                                      <input type="radio" name = "resp.id_qestions" aria-label="...">
                                  </span>
                                <input type="text" class="form-control" aria-label="..." ng-model="resp.resp">
                            </div>
                            <button class="btn btn-primary col-md-offset-9 col-md-3" ng-click="addOneResp(vopros)"><i class="fa fa-plus-circle" aria-hidden="true"></i> Добавить вариант ответа</button>
                        </div>
                    </div>
                </div>
                <div class="btn-group col-md-12 row" role="group">
                    <button class="btn btn-warning col-md-4" ng-click="addOneQuestions()"><i class="fa fa-plus-circle" aria-hidden="true"></i> Добавить вопрос</button>
                    <button class="btn btn-danger col-md-4" ng-click="dellOneTest(currPage)"><i class="fa fa-trash" aria-hidden="true"></i> Удалить тест</button>
                    <button class="btn btn-primary col-md-4"><i class="fa fa-save" aria-hidden="true"></i> Сохранить тест</button>
                </div>
            </div>
        </div>
    </section>
</div>
</body>
</html>