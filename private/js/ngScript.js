var app = angular.module("MainApp", [
  "angularUtils.directives.dirPagination",
  "ngSanitize",
]);

var url = window.location.origin + "/ajax/";
var siteurl = window.location.origin + "/";

// custom filter in Angular js
app.filter("removeUnderScore", function () {
  return function (input) {
    return input.replace(/_/gi, " ");
  };
});

app.filter("textToLower", function () {
  return function (input) {
    return input.replace(/_/gi, " ").toLowerCase();
  };
});

// ucwords custom filter in Angular js
app.filter("textBeautify", function () {
  return function (input) {
    var str = input.replace(/_/gi, " ").toLowerCase();

    return str.replace(/^([a-z])|\s+([a-z])/g, function ($1) {
      return $1.toUpperCase();
    });
  };
});

app.filter("join", function () {
  return function (input) {
    console.log(typeof input);
    return typeof input === "object" ? "" : input.join();
  };
});

app.filter("showStatus", function () {
  return function (input) {
    if (input == 1) {
      return "Available";
    } else {
      return "Not Available";
    }
  };
});

app.filter("status", function () {
  return function (input) {
    if (input == "active") {
      return "Running";
    } else {
      return "Blocked";
    }
  };
});

app.filter("fNumber", function () {
  return function (input) {
    var myNum = new Intl.NumberFormat("en-IN").format(input);
    return myNum;
  };
});

// Student Exam Attendence Collection CTRL
app.controller("ExamAttendanceCtrl", [
  "$scope",
  "$http",
  function ($scope, $http) {
    $scope.session_or_year = [];
    $scope.groups = [];
    $scope.section = [];
    $scope.subject = [];

    $scope.studentClasssInfoFn = function () {
      // get student class wayse Year/Session
      var where = {
        table: "tbl_admission",
        cond: { class_id: $scope.class_id },
        select: ["session"],
        groupBy: "session",
      };

      $http({
        method: "POST",
        url: url + "result",
        data: where,
      }).success(function (response) {
        if (response.length > 0) {
          $scope.session_or_year = response;
        }

        //console.log($scope.session_or_year);
      });
    };
  },
]);
