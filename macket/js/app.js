/**
 * Created by 1-PC on 22.08.2016.
 */

var app = angular.module("TestHub", ['textAngular']);

app.controller("pagingCtrl", function ($scope, $http, $sce) {

        $scope.showSp = true;
        $scope.showTest = false;
        $scope.addMode = false;

        $scope.sce = $sce;

        $scope.pages = [];

        $http.post("/admin/getAllTests").success(function (resp) {
            if (resp) {
                $scope.tests = angular.fromJson(resp);
                console.log($scope.tests);
            }
        });

        $http.post("/admin/getSitePages").success(function (resp) {
            $scope.pages = resp;

            $scope.currPage = $scope.pages[0];

            $scope.openStaticPage = function (page) {
                $scope.currPage = page;

                $scope.showSp = true;
                $scope.showTest = false;
                $scope.addMode = false;
            };

            $scope.openTestPage = function (page) {
                $scope.currPage = page;

                $scope.showSp = false;
                $scope.showTest = true;
            };

            $scope.chObj = function (id_res, id_ques, id_test) {
                console.log(id_res, id_ques, id_test);
                //$scope.tests[$scope.tests.indexOf($scope.currPage)].questions[id_ques-1].otv;
                console.log($scope.tests);
            };


            $scope.createPage = function () {
                nw_page = {
                    id: $scope.currPage + 1,
                    name: "Новая страница",
                    content: "Новая страница"
                };
                $scope.pages.push(nw_page);
                $scope.currPage = $scope.pages[$scope.pages.length - 1];
                $scope.addMode = true;
                $scope.save = "Сохранить";
            };
            //DELL
            $scope.dellPage = function (page) {
                $http.post("/admin/dellPage", page).success(function (resp) {
                    $scope.pages.remove(page);
                    alert('Страница успешно удалена.');
                    $scope.pages = angular.fromJson(resp);
                });
            };

            $scope.dellOneResp = function (resp, ques) {
                idx = $scope.currPage.questions.indexOf(ques);
                $scope.currPage.questions[idx].resp.remove(resp);
            };

            $scope.dellOneQues = function (ques) {
                $scope.currPage.questions.remove(ques);
            };

            $scope.dellOneTest = function (test) {
                $scope.tests.remove(test);
                delete $scope.currPage;
            };

            //ADD
            $scope.addOneResp = function (ques) {
                idx = $scope.currPage.questions.indexOf(ques);
                addRes = {
                    id: 0,
                    id_question :ques.id,
                    resp:"Новый ответ на вопросс"
                };
                $scope.currPage.questions[idx].resp.push(addRes);

            };

            $scope.addOneQuestions = function () {

                addQues = {
                    id:0,
                    id_test:$scope.currPage.id+1,
                    question:"Новый вопрос",
                    resp:[]
                };

                $scope.currPage.questions.push(addQues);
            };



            $scope.save = "Изменить";
            $scope.dell = "Удалить";

            $scope.savePage = function (mode) {
                if (mode) {
                    $http.post("/admin/createPage", $scope.currPage).success(function (resp) {
                        if (resp) {
                            alert('Страница успешно сохранена.');
                            $scope.pages = angular.fromJson(resp);
                        }
                    });
                } else {
                    $http.post("/admin/updatePage", $scope.currPage).success(function (resp) {
                        if (resp) {
                            alert('Страница успешно обновлена.');
                            $scope.pages = angular.fromJson(resp);
                        }
                    });
                }
            }
        });
    }
);

Array.prototype.remove = function (value) {
    var idx = this.indexOf(value);
    if (idx != -1) {
        // Второй параметр - число элементов, которые необходимо удалить
        return this.splice(idx, 1);
    }
    return false;
}
