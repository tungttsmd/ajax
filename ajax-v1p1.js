class ajaxPost {
  constructor(url = "", timer = 300) {
    this.urlInput = url;
    this.timerInput = timer;
  }

  ajaxObj(successFn, errorFn, input) {
    return {
      url: this.urlInput,
      type: "POST",
      data: input,
      success: successFn,
      error: errorFn,
    };
  }

  run(successFn, errorFn, input) {
    return setTimeout(() => {
      $.ajax(this.ajaxObj(successFn, errorFn, input));
    }, this.timerInput);
  }
}
class buttonAjax extends ajaxPost {
  constructor(selector, successFnInput, postData, timeout) {
    super("", timeout);
    this.ajaxSelector = selector;
    this.ajaxPostData = postData;
    this.successFnInput = successFnInput;
  }

  syncRun() {
    let timer;
    $(this.ajaxSelector).on("click", (event) => {
      event.preventDefault();
      clearTimeout(timer);

      let successFn = this.successFnInput;
      let errorFn = function () {
        $(".displayAjax").html("Lỗi kết nối server.");
      };

      timer = this.run(successFn, errorFn, this.ajaxPostData);
    });
  }
}
class keyupAjax extends ajaxPost {
  constructor(selector, successFnInput, timeout) {
    super("", timeout);
    this.ajaxSelector = selector;
    this.ajaxTimeout = timeout;
    this.successFnInput = successFnInput;
  }

  syncRun() {
    let timer;

    $(this.ajaxSelector).on("keyup", (event) => {
      event.preventDefault();
      clearTimeout(timer);
      let inputData = { search: $(this.ajaxSelector).val() };

      let successFn = this.successFnInput;
      let errorFn = function () {
        $(".displayAjax").html("Lỗi kết nối server.");
      };

      timer = this.run(successFn, errorFn, inputData);
    });
  }
}

let selector = "button[name='submit']";

let buttonAction = "click";

let postData = { name: "Hello mother fucker! bị gì á" };

let inputBar = "input[name='search']";

let timeout = 300;

let successFnInput = function (response) {
  $(".displayAjax").html(response);
};

const button = new buttonAjax(selector, successFnInput, postData, timeout);
const keyup = new keyupAjax(inputBar, successFnInput, timeout);
button.syncRun();
keyup.syncRun();
