

var tags = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('text'),
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  prefetch:{
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
      hint:true,
    name: 'tags',
    displayKey: 'text',
    source: tags.ttAdapter()
  }
});

if(TagsData){
    for(a in TagsData){
        elt.tagsinput('add', {"value":TagsData[a].id, "text":TagsData[a].tag_name});
    }
}



//elt.tagsinput('add', tags.ttAdapter());
