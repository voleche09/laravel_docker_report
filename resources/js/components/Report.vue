<template>
    <div>
        <h4>Transactions By Country</h4>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Country</th>
                    <th scope="col">Saccos</th>
                    <th scope="col">Deposited</th>
                    <th scope="col">Withdrawn</th>
                    <th scope="col">Net Gain</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="report in reports" v-bind:key="report.id">
                    <td>{{ report.country }}</td>
                    <td>{{ report.saccos }}</td>
                    <td>{{ report.deposit | numeral("0,0") }}</td>
                    <td>{{ report.withdrawal | numeral("0,0") }}</td>
                    <td>{{ report.gain | numeral("0,0") }}</td>
                </tr>
                <tr>
                    <th scope="col">Total</th>
                    <th scope="col">{{ totalSaccos }}</th>
                    <th scope="col">{{ totalDeposits | numeral("0,0") }}</th>
                    <th scope="col">{{ totalWithdrawn | numeral("0,0") }}</th>
                    <th scope="col">{{ totalNetGain | numeral("0,0") }}</th>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
export default {
    data() {
        return {
            reports: []
        };
    },
    created: function() {
        this.fetchReport();
    },
    methods: {
        fetchReport() {
            fetch("api/report/transactions")
                .then(res => res.json())
                .then(res => {
                    this.reports = res;
                });
        }
    },
    computed: {
        totalSaccos: function() {
            let total = 0;
            for (let i = 0; i < this.reports.length; i++) {
                total += parseInt(this.reports[i].saccos);
            }
            return total;
        },
        totalDeposits: function() {
            let total = 0;
            for (let i = 0; i < this.reports.length; i++) {
                total += parseInt(this.reports[i].deposit);
            }

            return total;
        },
        totalWithdrawn: function() {
            let total = 0;
            for (let i = 0; i < this.reports.length; i++) {
                total += parseInt(this.reports[i].withdrawal);
            }

            return total;
        },
        totalNetGain: function() {
            let total = 0;
            for (let i = 0; i < this.reports.length; i++) {
                total += parseInt(this.reports[i].gain);
            }

            return total;
        }
    }
};
</script>
