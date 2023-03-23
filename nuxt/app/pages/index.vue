<template>
  <v-row justify="center" align="center">
    <v-col cols="12" sm="8" md="6">
      <v-row>
        <v-col cols="12">
          <v-form @submit.prevent="chat">
            <v-textarea label="何か聞いてみて" v-model="text"></v-textarea>
            <v-btn type="submit" block class="mt-2">ChatGPT APIに聞いてみる</v-btn>
          </v-form>
        </v-col>
      </v-row>
      <v-row>
        <v-col cols="12">
          <v-card>
            <v-card-title>ChatGPT APIからの回答</v-card-title>
            <v-card-text>
              {{ response }}
            </v-card-text>
          </v-card>
        </v-col>
      </v-row>
    </v-col>
  </v-row>
</template>

<script>
import axios from 'axios';

export default {
  name: 'IndexPage',
  data() {
    return {
      text: '',
      response: 'まだ質問してないよ',
    };
  },
  methods: {
    chat() {
      axios.post('/api/chat', {text: this.text})
        .then((response) => {
          this.response = response.data;
        });
    }
  },
}
</script>
