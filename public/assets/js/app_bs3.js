

var tags = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('text'),
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  remote:{
      url:'http://localhost:8000/diary/tags'
  }
});
tags.initialize();

/**
 * Typeahead


/**
 * Objects as tags
 */
elt = $('.tags');
elt.tagsinput({
  itemValue: 'value',
  itemText: 'text',
  typeaheadjs: {
    name: 'tags',
    displayKey: 'text',
    source: tags.ttAdapter()
  }
});
