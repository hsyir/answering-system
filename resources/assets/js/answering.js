
Vue.component(
    'RespondingStage',
    require(
        './components/RespondingStage'
    ).default
);
Vue.component(
    'DepartmentSelect',
    require(
        './components/Inputs/DepartmetSelect'
    ).default
);

$('.department-search').select2(
    {
        placeholder: "",
        "language": {
            "noResults": function () {
                return "پیدا نشد";
            },
            "searching": function () {
                return "در حال جستجو";
            },
        },
        ajax: {
            url: function (params) {
                var term = typeof params.term === 'undefined' ? "" : params.term;
                console.log(term);
                return '/admin/search/symbols?term=' + term;
            },
            processResults: function (data) {
                var symbols = data.symbols.map(function (a) {
                    var text = `${a.title} ${a.full_name ? "/ " + a.full_name : ""} `;
                    return {text, id: a.id};
                });

                // Tranforms the top-level key of the response object from 'items' to 'results'

                return {
                    results: symbols
                };
            }
            // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
        }
    }
);