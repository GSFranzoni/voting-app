import React, {useEffect, useState} from "react";
import {
    Box,
    Button, Center,
    Flex, FormControl, FormErrorMessage, Heading,
    IconButton,
    Input,
    Stack
} from "@chakra-ui/react";
import { FaTrash, FaPlus } from 'react-icons/fa';
import AppCard from "../../components/Shared/AppCard";
import { connector, CreatePollProps } from "./props";
import Poll from "../../components/Poll";
import {PollOptionType, PollType} from "../../types/Poll";

const INITIAL_STATE: PollType = {
    description: '',
    options: [],
    finished: false,
    finishing: false
}

const CreatePollPage = ({ createPoll, creating, created, resetFlags }: CreatePollProps) => {
    const [ poll, setPoll ] = useState<PollType>(INITIAL_STATE)

    const addOption = () => {
        const options = [ ...poll.options ]
        options.push({ description: '' })
        setPoll((prev: PollType)  => ({ ...prev, options }))
    }

    const removeOption = () => {
        const options = [ ...poll.options ]
        options.pop()
        setPoll((prev: PollType)  => ({ ...prev, options }))
    }

    const updateOption = (updated: number, description: string) => {
        const options = [...poll.options].map((option, index) => {
            if (updated === index) {
                option.description = description
            }
            return option
        })
        setPoll((prev: PollType) => ({ ...prev, options }))
    }

    const validateDescription = () => {
        return poll.description.length > 0
    }

    const validateOption = (index: number) => {
        return poll.options[index].description.length > 0
    }

    const updateDescription = (description: string) => {
        setPoll((prev: PollType) => ({ ...prev, description }))
    }

    useEffect(() => {
        resetFlags()
        addOption()
    }, []);

    const validateForm = () => {
        for (let i=0; i<poll.options.length; i++) {
            if (!validateOption(i)) {
                return false
            }
        }
        return validateDescription()
    }

    if (created) {
        return <Center>
            <Poll { ...poll } />
        </Center>
    }

    return <Center>
        <AppCard title={'Create your Poll'}>
            <FormControl isInvalid={!validateDescription()}>
                <Input
                    isInvalid={!validateDescription()}
                    type={'text'}
                    placeholder={'Description'}
                    variant={'filled'}
                    size={'lg'}
                    disabled={creating}
                    onChange={(event: React.ChangeEvent<HTMLInputElement>) => updateDescription(event.target.value)}
                />
                {!validateDescription() && <FormErrorMessage>Description is required.</FormErrorMessage>}
            </FormControl>
            <Box>
                <Heading paddingY={5} size={'md'}>
                    Options
                    <IconButton
                        variant={'ghost'}
                        ml={2}
                        aria-label={'add'}
                        onClick={addOption}
                        icon={<FaPlus />}
                        colorScheme={'blue'}
                        disabled={creating}
                    />
                    <IconButton
                        variant={'ghost'}
                        aria-label={'trash'}
                        onClick={removeOption}
                        icon={<FaTrash />}
                        colorScheme={'red'}
                        disabled={creating}
                    />
                </Heading>
                <Stack spacing={3}>{poll.options.map((option: PollOptionType, index: number) => {
                    return <FormControl isInvalid={!validateOption(index)} key={index}>
                        <Input isInvalid={!validateOption(index)}
                            type={'text'}
                            placeholder={'Option'}
                            variant={'filled'}
                            size={'lg'}
                            disabled={creating}
                            onChange={(event) => updateOption(index, event.target.value)}
                        />
                    </FormControl>
                })}</Stack>
            </Box>
            <Flex direction={'row'} justifyContent={'end'} alignItems={'center'} paddingTop={5} gap={2}>
                <Button
                    disabled={!validateForm() || creating}
                    colorScheme='green'
                    type='submit'
                    size={'sm'}
                    isLoading={creating}
                    onClick={() => createPoll(poll)}
                >Create Poll</Button>
            </Flex>
        </AppCard>
    </Center>
}

export default connector(CreatePollPage)
