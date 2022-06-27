import {PollOptionType, PollType} from "../types/Poll";

const createVote = (option: PollOptionType): Promise<void> => {
    return new Promise<any>((resolve, reject) => setTimeout(() => {
        // reject('There was an error saving the vote :(')
        resolve(1)
    }, 1000))
}

const getPoll = (id: string): Promise<PollType> => {
    return new Promise<any>((resolve, reject) => setTimeout(() => {
        resolve({
            id: '1',
            description: 'Poll 1',
            options: [
                {
                    id: '1',
                    description: 'Option 1',
                    votes: 0
                },
                {
                    id: '2',
                    description: 'Option 2',
                    votes: 0
                },
                {
                    id: '3',
                    description: 'Option 3',
                    votes: 0
                }
            ]
        })
    }, 1000))
}

export default {
    getPoll,
    createVote
}
