<template>
    <div>
        <hr>
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="categories" class="col-sm-9 control-label">دسته بندی : <span class="text-danger">{{maincategories_select_title[0]}}</span></label>
                <select id="categories" class="form-control" name="maincategory" v-model="maincategories_select" required
                        @change="mainchange($event)">
                    <option v-for="maincategoy in maincategories" :value="maincategoy.id">
                        {{ maincategoy.title }}
                    </option>

                    <option v-if="pro" :value="maincategories_select">
                        {{ maincategories_select_title[0] }}
                    </option>
                </select>
            </div>
        </div>
        <div class="row">
            <div v-if="flag">
                <div class="form-group col-md-2" v-for="attribute in attributes">
                    <label>ویژگی {{attribute.title}}</label>
                    <select name="attributes[]" class="form-control">
                        <option v-if="!pro" v-for="attributevalues in attribute.attributevalue" :value="attributevalues.id">
                            {{attributevalues.title}}
                        </option>
                        <option v-if="pro" v-for="attributevalues in attribute.attributevalue"
                                :value="attributevalues.id"
                                :selected="mainattribute_selected.includes(attributevalues.id)">
                            {{attributevalues.title}}
                        </option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                maincategories_select: [],
                maincategories_select_title: [],
                maincategories: [],
                mainattribute_selected:[],
                flag: false,
                attributes: []
            }
        },
        props: ['product', 'pro'],
        mounted() {
            axios.get('/api/categories').then(
                res => {
                    this.maincategories = res.data.categories
                }).catch(err => {
                console.log(err)
            })
            if (this.pro) {
                for (var i = 0; i < this.pro.categories.length; i++) {
                    this.maincategories_select.push(this.pro.categories[i].id);
                    this.maincategories_select_title.push(this.pro.categories[i].title);
                }
                for(var j=0; j<this.pro.attributevalus.length; j++){
                    this.mainattribute_selected.push(this.pro.attributevalus[j].id)
                }
                this.mainchange2();
            }
        },
        methods: {
            mainchange() {
                axios.post('/api/categories/attribute', this.maincategories_select).then(res => {
                    this.flag = true;
                    this.attributes = res.data.attributes;
                }).catch(err => {
                    console.log(err)
                    this.flag = false;
                })
                this.maincategories_select_title=[];
            },
            mainchange2() {
                axios.post('/api/categories/attribute', this.maincategories_select[0]).then(res => {
                    this.flag = true;
                    this.attributes = res.data.attributes;
                }).catch(err => {
                    console.log(err)
                    this.flag = false;
                })
            },
        },

    }
</script>
