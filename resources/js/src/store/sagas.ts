import { all, fork } from "redux-saga/effects";
import AuthSagas from "./auth/sagas";
import VoteSagas from "./vote/sagas";
import PollsSagas from "./polls/sagas";

export function* sagas() {
    yield all([
        fork(AuthSagas),
        fork(VoteSagas),
        fork(PollsSagas)
    ]);
}
