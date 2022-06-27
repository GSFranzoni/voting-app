import { connect, ConnectedProps } from 'react-redux'
import { AppState } from "../../store";
import { createPollRequest, resetPollFlags } from "../../store/polls/actions";

const mapState = (state: AppState) => ({
    creating: state.polls.creating,
    created: state.polls.created
})

const mapDispatch = {
    createPoll: createPollRequest,
    resetFlags: resetPollFlags
}

export const connector = connect(mapState, mapDispatch)

export type CreatePollProps = ConnectedProps<typeof connector>
