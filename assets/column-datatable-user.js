 $('#assigment_project').DataTable({
              processing: true,
              serverSide: true,
              
              columns:[
               {
                data: 'agreement_date',
                name: 'agreement_date'
               },
               {
                data: 'companies_name',
                name: 'companies_name'
               },
               {
                data: 'proposal_number',
                name: 'proposal_number'
               },
               {
                data: 'assignment_number',
                name: 'assignment_number'
               },
               {
                data: 'services',
                name: 'services'
               },
               {
                data: 'action',
                name: 'action',
                orderable: false
               }
              ]
            });

            $('#assigment_project_pending').DataTable({
              processing: true,
              serverSide: true,
              
              columnDefs: [{"targets":0, "type":"date-eu"}],
              order: [[ 0, 'desc' ]],
              
              columns:[
               {
                data: 'agreement_date',
                name: 'agreement_date'
               },
               {
                data: 'companies_name',
                name: 'companies_name'
               },
               {
                data: 'proposal_number',
                name: 'proposal_number'
               },
               {
                data: 'assignment_number',
                name: 'assignment_number'
               },
               {
                data: 'services',
                name: 'services'
               },
               {
                data: 'action',
                name: 'action',
                orderable: false
               }
              ]
            });

            $('#assigment_project_ongoing').DataTable({
              processing: true,
              serverSide: true,

              columnDefs: [{"targets":0, "type":"date-eu"}],
              order: [[ 0, 'desc' ]],

              columns:[
               {
                data: 'start_date',
                name: 'start_date'
               },
               {
                data: 'companies_name',
                name: 'companies_name'
               },
               {
                data: 'proposal_number',
                name: 'proposal_number'
               },
               {
                data: 'assignment_number',
                name: 'assignment_number'
               },
               {
                data: 'services',
                name: 'services'
               },
               {
                data: 'action',
                name: 'action',
                orderable: false
               }
              ]
            });
            
            $('#assigment_project_done').DataTable({
              processing: true,
              serverSide: true,

              columnDefs: [{"targets":0, "type":"date-eu"}],
              order: [[ 0, 'desc' ]],

              columns:[
               {
                data: 'start_date',
                name: 'start_date'
               },
               {
                data: 'end_date',
                name: 'end_date'
               },
               {
                data: 'companies_name',
                name: 'companies_name'
               },
               {
                data: 'proposal_number',
                name: 'proposal_number'
               },
               {
                data: 'assignment_number',
                name: 'assignment_number'
               },
               {
                data: 'services',
                name: 'services'
               },
               {
                data: 'action',
                name: 'action',
                orderable: false
               }
              ]
            });

            $('#assigment_monthly_pending').DataTable({
              processing: true,
              serverSide: true,

              columnDefs: [{"targets":0, "type":"date-eu"}],
              order: [[ 0, 'desc' ]],
              
              columns:[
               {
                data: 'agreement',
                name: 'agreement'
               },
               {
                data: 'companies_name',
                name: 'companies_name'
               },
               {
                data: 'proposal_number',
                name: 'proposal_number'
               },
               {
                data: 'services',
                name: 'services'
               },
               {
                data: 'action',
                name: 'action',
                orderable: false
               }
              ]
            });

            $('#assigment_monthly_ongoing').DataTable({
              processing: true,
              serverSide: true,

              columnDefs: [{"targets":0, "type":"date-eu"}],
              order: [[ 0, 'desc' ]],

              columns:[
               {
                data: 'start_date',
                name: 'start_date'
               },
               {
                data: 'companies_name',
                name: 'companies_name'
               },
               {
                data: 'proposal_number',
                name: 'proposal_number'
               },
               {
                data: 'services',
                name: 'services'
               },
               {
                data: 'action',
                name: 'action',
                orderable: false
               }
              ]
            });
            
            $('#assigment_monthly_done').DataTable({
              processing: true,
              serverSide: true,

              columnDefs: [{"targets":0, "type":"date-eu"}],
              order: [[ 0, 'desc' ]],

              columns:[
               {
                data: 'start_date',
                name: 'start_date'
               },
               {
                data: 'end_date',
                name: 'end_date'
               },
               {
                data: 'companies_name',
                name: 'companies_name'
               },
               {
                data: 'proposal_number',
                name: 'proposal_number'
               },
               {
                data: 'services',
                name: 'services'
               },
               {
                data: 'action',
                name: 'action',
                orderable: false
               }
              ]
            });