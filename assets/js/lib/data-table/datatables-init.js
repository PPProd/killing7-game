(function ($) {
    //    "use strict";


    /*  Data Table
    -------------*/




    $('#bootstrap-data-table').DataTable({
        lengthMenu: [[10, 20, 50, -1], [10, 20, 50, "All"]],
		buttons: [
        'copy', 'excel', 'pdf'
    ],
		language: {
			  "sEmptyTable":     "Nincs rendelkezésre álló adat",
			  "sInfo":           "Találatok: _START_ - _END_ Összesen: _TOTAL_",
			  "sInfoEmpty":      "Nulla találat",
			  "sInfoFiltered":   "(_MAX_ összes adat közül szűrve)",
			  "sInfoPostFix":    "",
			  "sInfoThousands":  " ",
			  "sLengthMenu":     "_MENU_ Eredmény oldalanként",
			  "sLoadingRecords": "Betöltés...",
			  "sProcessing":     "Feldolgozás...",
			  "sSearch":         "Keresés:",
			  "sZeroRecords":    "Nincs a keresésnek megfelelő találat",
			  "oPaginate": {
				  "sFirst":    "Első",
				  "sPrevious": "Előző",
				  "sNext":     "Következő",
				  "sLast":     "Utolsó"
			  },
			  "oAria": {
				  "sSortAscending":  ": Növekvő rendezés",
				  "sSortDescending": ": Csökkenő rendezés"
			  }
		   },
    });



    $('#bootstrap-data-table-export').DataTable({
        dom: 'lBfrtip',
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
	
	$('#row-select').DataTable( {
			initComplete: function () {
				this.api().columns().every( function () {
					var column = this;
					var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
							);
	 
							column
								.search( val ? '^'+val+'$' : '', true, false )
								.draw();
						} );
	 
					column.data().unique().sort().each( function ( d, j ) {
						select.append( '<option value="'+d+'">'+d+'</option>' )
					} );
				} );
			}
		} );






})(jQuery);