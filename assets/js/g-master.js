$(function () {
      $('.ui.sidebar').sidebar({
    context: $('.bottom.segment')
  }).sidebar('attach events', '.item.pizzabars');

  $('.dropdown').dropdown({
  // you can use any ui transition
    transition: 'drop'
  });
});
function text_truncate(str, length, ending) {
  if (length == null) {
    length = 100;
  }
  if (ending == null) {
    ending = '';
  }
  if (str.length > length) {
    return str.substring(0, length - ending.length) + ending;
  } else {
    return str;
  }
};