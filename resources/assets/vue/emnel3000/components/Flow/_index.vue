<template>



    <div class="flow-container padding-top-20">

        <div class="header">
            <div class="clearfix">
                <div class="col-md-6">
                    <h4>Welcome To Tist1</h4>
                </div>
                <div class="col-md-6 pull-right">
                    <span class="pull-right">controls</span>
                </div>
            </div>
        </div>

        <div class="body">
            <div class="container-fluid">
                <div class="row align-tems-start">
                    <div class="col-md-1 col-md-offset-5">
                        <a><i class="fa fa-plus-circle fa-3x color-text3 text-center"></i></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 relative">  
                        <div class="flow-chart">
                            <div class="main">

                                <div class="box add-page">test</div>
                            
                            </div>
                        </div>    
                    </div>
                </div>
          </div>

        </div>
    </div>
</template>

<script>
  // import d3 from 'd3';
  import * as d3 from "d3";
  import 'dagre';
  import dagreD3 from 'dagre-d3';
  export default {
    name: "Flow",
    data() {
      return {
        graph: null,
        render: null,
        flows: {
          addPage: {
            name: 'add_page',
            id: 'add-page',
            title: 'Add Page',
            text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
            children: {
              condition: {
                name: 'condition',
                id: 'condition',
                title: 'Condition',
                text: 'Segment Contacts by sending them down a yes or no path based on certain conditions',
                children: {
                  wait: {
                    name: 'wait',
                    id: 'wait',
                    title: 'Wait',
                    text: null,
                    children: {
                      test_one: {
                        name: 'testOne',
                        id: 'test-one',
                        title: 'Test One',
                        text: "Lorem",
                        children: {}
                      }
                    }
                  },
                  whatHappensNext: {
                    name: 'what_happens_next',
                    children: {
                      test_two: {
                        name: 'testTwo',
                        id: 'test-two',
                        title: "Test Two",
                        text: "test two",
                        children: {}
                      },
                      test_three: {
                        name: 'testThree',
                        id: 'test-three',
                        title: 'Test Three',
                        text: 'test htree',
                        children: {}
                      }
                    }
                  }
                }
              }
            }
          }
        }
      };
    },
    mounted() {
      let g = new dagreD3.graphlib.Graph()
        .setGraph({})
        .setDefaultEdgeLabel(() => ({}));

      function recursive(obj, g, parent = "") {
        Object.keys(obj).map((key) =>  {
          // console.log(obj[data]);
          // if (obj['data']) {}
          // if (key !== "children") {
          //   console.log(obj[key])
          // } else {
          //   recursive(obj[key])
          // }

          // if ("children" in obj[key]) {
          //   console.log(key + " has children")
          // }
          g.setNode(obj[key]['name'], {
            labelType: 'html',
            label: obj[key]['name'],
            class: obj[key]['id'],
          })
          if (parent !== "") {
            console.log("parent: " + parent + " name: " + obj[key]['name'])
            g.setEdge(parent, obj[key]['name'])
          }
          console.log(obj[key]['children'], obj[key]['name'])
          recursive(obj[key]['children'], g, obj[key]['name']);
        });
      }
      // console.log(typeof this.flows);
      recursive(this.flows, g);
      g.nodes().forEach(function (v) {
            var node = g.node(v);
            // Round the corners of the nodes
            node.rx = node.ry = 5;
        });

      console.log(g.nodes());

      // console.log(g.nodes())

      // Create the renderer
      var render = new dagreD3.render();

      // Set up an SVG group so that we can translate the final g.
      var svg = d3.select("svg"),
      svgGroup = svg.append("g");

      // Run the renderer. This is what draws the final g.
      render(d3.select("svg g"), g);

      // Center the graph
      var xCenterOffset = (svg.attr("width") - g.graph().width) / 2;
      svgGroup.attr("transform", "translate(" + xCenterOffset + ", 20)");
      svg.attr("height", g.graph().height + 40);
    }
  }
</script>

<style lang="scss" scoped>
    .flow-container {
        .header {
            margin-top: 10px;
        }
    }


