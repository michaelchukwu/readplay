$('#manual-ajax').click(function(event) {
    event.preventDefault();
    this.blur(); // Manually remove focus from clicked link.
    $.get(this.href, function(html) {
      $(html).appendTo('body').modal();
    });
  });