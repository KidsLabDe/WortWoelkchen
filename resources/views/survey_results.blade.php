<x-layout-noheader title="Ergebnisse">
    <section class="page-section portfolio" id="portfolio">
        <div class="container">

            <script src="https://d3js.org/d3.v4.js"></script>
            <script src="https://cdn.jsdelivr.net/gh/holtzy/D3-graph-gallery@master/LIB/d3.layout.cloud.js"></script>
            <script src="https://code.jquery.com/jquery-3.7.1.js"></script>


            <!-- Create a div where the graph will take place -->

            <div class="container-fluid py-5">


                <main class="px-3 center">

                    <div id="my_dataviz"></div>


                    <div>
                        <h1>Umfrageergebnisse:</h1>

                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Antwort</th>
                                <th scope="col">Antworten</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($words as $word)
                                <tr>
                                    <th scope="row">{{ $loop->index +1 }}</th>
                                    <td>{{ $word->word }}</td>
                                    <td>{{ $word->total }}</td>
                                  </tr>
    
                            @endforeach

                            </tbody>
                          </table>                        
                        <!-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius -->
                    </div>

                </main>


            </div>

            <script>
                // List of words
                // URL, die die Wortliste bereitstellt
                var url = "/api/survey-result/b8e247e6-f713-4995-a642-d8fd0ef6d1c4";
                var myWords = [

                    @foreach ($words as $word)
                        '{{ $word->word }}',
                    @endforeach


                ];



                // set the dimensions and margins of the graph
                var margin = {
                        top: 10,
                        right: 10,
                        bottom: 10,
                        left: 10
                    },
                    width = 450 - margin.left - margin.right,
                    height = 450 - margin.top - margin.bottom;

                // append the svg object to the body of the page
                var svg = d3.select("#my_dataviz").append("svg")
                    .attr("width", width + margin.left + margin.right)
                    .attr("height", height + margin.top + margin.bottom)
                    .append("g")
                    .attr("transform",
                        "translate(" + margin.left + "," + margin.top + ")");

                // Constructs a new cloud layout instance. It run an algorithm to find the position of words that suits your requirements
                var layout = d3.layout.cloud()
                    .size([width, height])
                    .words(myWords.map(function(d) {
                        return {
                            text: d
                        };
                    }))
                    .padding(10)
                    .fontSize(60)
                    // .rotate(function() { return ~~(Math.random() * 1) * 90; })
                    // .random(function(d) { return 1; })
                    .on("end", draw);


                // Fetch die Daten von der URL
                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        // List of words

                        myWords2 = data;
                        console.log(myWords);

                        // Rest des Codes...


                    })
                    .catch(error => console.error('Error:', error));



                layout.start();


                // This function takes the output of 'layout' above and draw the words
                // Better not to touch it. To change parameters, play with the 'layout' variable above
                function draw(words) {
                    svg
                        .append("g")
                        .attr("transform", "translate(" + layout.size()[0] / 2 + "," + layout.size()[1] / 2 + ")")
                        .selectAll("text")
                        .data(words)
                        .enter().append("text")
                        .style("font-size", function(d) {
                            return d.size + "px";
                        })
                        .attr("text-anchor", "middle")
                        .attr("transform", function(d) {
                            return "translate(" + [d.x, d.y] + ")rotate(" + d.rotate + ")";
                        })
                        .text(function(d) {
                            return d.text;
                        });
                }
            </script>

        </div>
    </section>


</x-layout-noheader>
