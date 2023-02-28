// $(function(){
  
//   $.typeahead({
//     input: "#title",
//     hint: true,
//     highlight: true,
//     minLength: 2,
//     source: {
//       groupName: {

//         ajax: function(query) {
//           return {
//             type: "GET",
//             url: "/autocomplete",
//             data: {
//               query: "{{query}}"
//             },
//             callback: {
//               done: function(data) {
//                 return data;
//               }
//             }
//           }
//         }
//       }
//     },
//     display: 'title',
//     template: {
      
//       suggestion: function(data) {
//         return '<div>' + data.title + '</div>';
//       }
//     }
//   });
// })