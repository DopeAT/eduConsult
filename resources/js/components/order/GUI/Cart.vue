<template>
    <div>
        <h5 class="font-weight-bold text-center">Your Order Details</h5>

        <div class="cart-body">
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-center">
                    <div>
                        <h6 class="my-0">Est. Delivery Date</h6>
                        <p class="calendar">
                            {{ deliveryDay }}
                            <em>{{ deliveryMonth }}</em>
                        </p>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (GBP)</span>
                    <strong>£{{total}}</strong>
                </li>
            </ul>

            <div class="input-group mt-5">
<!--                <input type="text" class="form-control" placeholder="Promo code">-->
<!--                <div class="input-group-append">-->
<!--                    <button type="submit" class="btn btn-secondary">Redeem</button>-->
<!--                </div>-->
            </div>

            <div class="mt-3">
                <div class="card p-3">
                    <div class="text-center">
                        <h5 class="mt-2"><i class="fas fa-life-ring text-danger"></i> <b>NOT SURE</b></h5>
                        <p>About your choice?</p>
                    </div>
                    <div class="description-text text-center">
                        <small class="text-muted">
                            <span>Let us help you!</span> <br/>
                        </small>
                    </div>
                    <div class="card-actions row justify-content-center p-2">
                        <a class="font-weight-bold" href="javascript:void(Tawk_API.toggle())">Live Chat</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex'

    export default {
        name: "Cart",
        data() {
            return {}
        },
        computed: {
            ...mapGetters({
                delivery: 'OrderDetails/getDeliveryDate',
                total: 'OrderDetails/getTotal'
            }),
            deliveryDate() {
                return new Date(new Date().getTime() + (this.delivery * 24 * 60 * 60 * 1000));
            },
            deliveryDay() {
                return this.deliveryDate.getDate();
            },
            deliveryMonth() {
                return this.deliveryDate.toLocaleString('default', { month: 'long' });
            }
        },
    }
</script>

<style scoped>
    .calendar {
        margin: .25em 10px 10px 10px;
        padding-top: 5px;
        float: left;
        width: 90px;
        background: #ededef;
        background: -webkit-gradient(linear,left top,left bottom,from(#ededef),to(#ccc));
        background: -moz-linear-gradient(top,#ededef,#ccc);
        font: bold 30px/60px Arial Black,Arial,Helvetica,sans-serif;
        text-align: center;
        color: #000;
        text-shadow: #fff 0 1px 0;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        border-radius: 3px;
        position: relative;
        -moz-box-shadow: 0 2px 2px #888;
        -webkit-box-shadow: 0 2px 2px #888;
        box-shadow: 0 2px 2px #888;
    }

    .calendar:before {
        left: 11px;
    }
    .calendar:before, .calendar:after {
        content: '';
        float: left;
        position: absolute;
        top: 5px;
        width: 8px;
        height: 8px;
        background: #111;
        z-index: 1;
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        border-radius: 10px;
        -moz-box-shadow: 0 1px 1px #fff;
        -webkit-box-shadow: 0 1px 1px #fff;
        box-shadow: 0 1px 1px #fff;
    }

    .calendar em {
        display: block;
        font: normal bold 11px/30px Arial,Helvetica,sans-serif;
        color: #fff;
        text-shadow: #00365a 0 -1px 0;
        background: #04599a;
        background: -webkit-gradient(linear,left top,left bottom,from(#04599a),to(#00365a));
        background: -moz-linear-gradient(top,#04599a,#00365a);
        -moz-border-radius-bottomright: 3px;
        -webkit-border-bottom-right-radius: 3px;
        border-bottom-right-radius: 3px;
        -moz-border-radius-bottomleft: 3px;
        -webkit-border-bottom-left-radius: 3px;
        border-bottom-left-radius: 3px;
        border-top: 1px solid #00365a;
    }

    .calendar em:before {
        left: 13px;
    }
    .calendar em:before, .calendar em:after {
        content: '';
        float: left;
        position: absolute;
        top: -5px;
        width: 4px;
        height: 14px;
        background: #dadada;
        background: -webkit-gradient(linear,left top,left bottom,from(#f1f1f1),to(#aaa));
        background: -moz-linear-gradient(top,#f1f1f1,#aaa);
        z-index: 2;
        -moz-border-radius: 2px;
        -webkit-border-radius: 2px;
        border-radius: 2px;
    }

    .calendar em:after {
        right: 13px;
    }
    .calendar em:before, .calendar em:after {
        content: '';
        float: left;
        position: absolute;
        top: -5px;
        width: 4px;
        height: 14px;
        background: #dadada;
        background: -webkit-gradient(linear,left top,left bottom,from(#f1f1f1),to(#aaa));
        background: -moz-linear-gradient(top,#f1f1f1,#aaa);
        z-index: 2;
        -moz-border-radius: 2px;
        -webkit-border-radius: 2px;
        border-radius: 2px;
    }

    .calendar:after {
        right: 11px;
    }
    .calendar:before, .calendar:after {
        content: '';
        float: left;
        position: absolute;
        top: 5px;
        width: 8px;
        height: 8px;
        background: #111;
        z-index: 1;
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        border-radius: 10px;
        -moz-box-shadow: 0 1px 1px #fff;
        -webkit-box-shadow: 0 1px 1px #fff;
        box-shadow: 0 1px 1px #fff;
    }
</style>
