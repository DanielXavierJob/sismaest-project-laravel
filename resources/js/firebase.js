import {
    initializeApp
} from "firebase/app";
import {
  getFirestore
} from "firebase/firestore"



const firebaseConfig = {
    apiKey: "", //api key
    authDomain: "", //authDomain
    projectId: "sismaest",
    storageBucket: "", //storageBucket
    messagingSenderId: "", //messaging sender
    appId: "", //api ID,
    measurementId: "" //meansure ID 
};
const app = initializeApp(firebaseConfig);
const db = getFirestore();


export {app, db}

