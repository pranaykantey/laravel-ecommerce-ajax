(function($){
    $(document).ready(function(){
        const myMultiSelect = document.getElementById('multiSelect')

        if (myMultiSelect) {
        new coreui.MultiSelect(myMultiSelect, {
            name: 'multiSelect',
            options: [
            {
                value: 0,
                text: 'Angular'
            },
            {
                value: 1,
                text: 'Bootstrap',
                selected: true
            },
            {
                value: 2,
                text: 'React.js',
                selected: true
            },
            {
                value: 3,
                text: 'Vue.js'
            },
            {
                label: 'backend',
                options: [
                {
                    value: 4,
                    text: 'Django'
                },
                {
                    value: 5,
                    text: 'Laravel'
                },
                {
                    value: 6,
                    text: 'Node.js',
                    selected: true
                }
                ]
            }
            ],
            search: true
        })
        }
    });
}(jQuery));
